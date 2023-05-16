<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageText extends Model
{
    protected $fillable=[
        'appointment_modal_title','appointment_submit_btn','appointment_close_btn','doctor_search_btn','service_learn_more','service_btn','department_btn','subscribe_btn','email_address','phone','address','footer_about_us','footer_importent_link','footer_recent_post','department_read_more_btn','department_doctor','frequently_ask_questions','related_video','quick_contact','blog_learn_more','blog_category','blog_recent_post','comments','get_comment','comment_submit_btn','send_msg_btn','appointment_fee','doctor_info','doctor_working_hours','doctor_address','doctor_education','doctor_experience','doctor_qualification','doctor_book_appointment','doctor_book_appointment_title','login_btn','login_text','register_btn','register_text','forget_pass_btn','forget_pass_text','reset_pass_btn','reset_pass_text','appointment_list','pay_now','stripe','stripe_btn','paypal','paypal_btn','bank_transfer','bank_transfer_btn','bank_account_info','transaction_info','total_order','total_appointment','pending_appointment','dashboard','message','send_message_btn','account_info','order_list','change_password','logout','update_profile_btn','patient_id','billing_info','pyshical_info','prescribe','advice','appointment_history','order_info','doctor_not_found','post_not_found','not_found',

        'schedule_not_found','select_department','select_doctor','select_date','select_location','admin','week_day','schedule','doctor','department','location','date','action','total','card_number','cvc','expiration_month','expiration_year','name','guardian_name','guardian_phone','patient_age','occupation','gender','country','city','photo','date_of_birth','weight','height','helth_insurance_number','helth_card_number','helth_card_provider','blood_group','disablities','Serial_number','payment','treated','order_id','payment_method','transaction_id','description','blood_pressure','pulse_rate','temperature','habits','problems','medicine_type','medicine_name','dosage','day','time','test_description','order_id','password','confirm_password','change_password_btn','subject','comment','select_schedule','select_gender','male','female','others','stripe_card_error','upcoming_meeting','meeting_history','duration','meeting_id','join_link','minute',
        ];

}
