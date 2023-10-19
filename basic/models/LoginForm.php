<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;


/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    /**
    * @var UploadedFile
    */
    public $excel;

    private $_user = false;
    private $_password = false;




    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            //['password', 'validatePassword'],
            [['excel'], 'file', 'extensions' => 'xls, xlsx'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
       
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate() && $this->getUser() !== null && $this->getPassword() !== null) {
                  
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);            
        }

        return $this->_user;
    }
    public function getPassword()
    {
        if ($this->_password === false) {
            $this->_password = User::findByPassword($this->password);
        }

        return $this->_password;
    }
    public function upload()
    {

        if ($this->validate()) {
            $excelpath = Yii::getAlias('uploads/' . 'history.xls');
            if (!is_dir(dirname($excelpath))) {
                FileHelper::createDirectory(dirname($excelpath));
            }
            $this->excel->saveAs($excelpath);
            return true;
        } else 
        {
            return false;
        }
    
        
    }
    public function calc(){
        $shop2Sum = 0;
        $shop1Sum = 0;
        $file = 'uploads/history.xls';
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
        
        $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($file);
        $sheet = $objPHPExcel->getSheet(0);
        $highestrow = $sheet->getHighestRow();
       // $highestcolumn = 0;
        for ($i = 0; $i < 20; $i++){
            $rowdata = $sheet->getcell('A'.$i);
            if ($rowdata == 'Transaction Date'){
                $highestcolumn = $i + 1;
                break;
            }
        }
        $shop2Sum = 0;
        for ($i = $highestcolumn; $i <= $highestrow; $i++){
            $rowdata = $sheet->getcell('C'.$i)->getValue();
            if((substr($rowdata, 10,7) == '6339184')){
               $shop2Sum += ($sheet->getcell('E'.$i)->getValue());
            }
            if((substr($rowdata, 10,7) == '6057214')){
                $shop1Sum += ($sheet->getcell('E'.$i)->getValue());
             }                
       }
       return [$shop1Sum, $shop2Sum];
    }
}
