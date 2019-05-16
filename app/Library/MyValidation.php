<?php
namespace App\Library;

class MyValidation
{

    public static $rulesUser = array(
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|alpha_num|min:8|max:20'
    );

    public static $ruleQuestion = array(
        'question_content' => 'required',
    );

    public static $ruleDoctor = array(
        'name' => 'required',
        'id_number' => 'required|unique:doctors',
        'email' => 'required|unique:doctors',
    );

    public static $ruleEmployee = array(
        'name' => 'required',
        'id_number' => 'required|unique:employees',
        'email' => 'required|unique:employees',
    );
    public static $rulePatient = array(
        'name' => 'required',
        'id_number' => 'required|unique:patients',
        'email' => 'required|unique:patients',
    );
    public static $ruleCertificate = array(
        'name' => 'required',
        'image' => 'required',
    );
    public static $ruleRating = array(
        'star' => 'required',
    );


    public static $messageUser = array(
        'name' => 'Name is missing',
        'email.required' => 'Email is missing',
        'email.email' => 'Email is incorrect',
        'password.required' => 'Password is missing',
        'password.min' => 'Minimum length of password must be more than 8',
        'password.max' => 'Maximum length of password must be less than 20',
        'password.alpha_num' => 'Password should contain both number and character',
    );

    public static $messageQuestion = array(
        'question_content' => 'Question content is required',
    );


    public static $messageDoctor = array(
        'name' => 'Name is required',
        'email' => 'Email is required'
    );

    public static $messagePatient = array(
        'name' => 'Name is required',
        'email' => 'Email is required',
        'id_number' => 'ID number is required',
    );
    public static $messageCertificate = array(
        'name' => 'Name is required',
        'image' => 'Image is required'
    );

    public static $messageRating = array(
        'star' => 'Star is required'
    );

    public static $messageEmployee = array(
        'name' => 'Name is required',
        'email' => 'Email is required',
        'id_number' => 'ID number is required',
    );
}
