<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldLabel extends Model
{
    protected $table = "field_labels";

    protected $fillable = [
        'name',
        'display',
        'description',
        'status',
        'category',
        'user_id',
        'old_display',
    ];
    // protected $fillable = [
    //     'user_id',
    //     'ymk',
    //     'originzsc',
    //     'originzip',
    //     'originstate',
    //     'origincity',
    //     'oterminal',
    //     'oauction',
    //     'oauctionpho',
    //     'oauctiondate',
    //     'oauctiontime',
    //     'oacutionaccounttitle',
    //     'oacutionaccountname',
    //     'destinationzsc',
    //     'destinationzip',
    //     'destinationstate',
    //     'destinationcity',
    //     'dterminal',
    //     'dauction',
    //     'dauctionpho',
    //     'dauctiondate',
    //     'dauctiontime',
    //     'dacutionaccounttitle',
    //     'dacutionaccountname',
    //     'shippingdate',
    //     'transport',
    //     'name',
    //     'email',
    //     'phonenumber',
    //     'condition',
    //     'condition1',
    //     'condition2',
    //     'condition3',
    //     'length_ft',
    //     'length_in',
    //     'width_ft',
    //     'width_in',
    //     'height_ft',
    //     'height_in',
    //     'year',
    //     'make',
    //     'model',
    //     'payment',
    //     'u_id',
    //     'pstatus',
    //     'milage',
    //     'car_type',
    //     'ip_address',
    //     'ipcity',
    //     'ipregion',
    //     'ipcountry',
    //     'iploc',
    //     'ippostal',
    //     'browser',
    //     'platform',
    //     'phone2',
    //     'phone3',
    //     'address',
    //     'address2',
    //     'fax',
    //     'in_auction',
    //     'color',
    //     'vbrakes',
    //     'vrolls',
    //     'vkey',
    //     'vdate',
    //     'oname',
    //     'oemail',
    //     'ophone',
    //     'ophone2',
    //     'ophone3',
    //     'obuyer_no',
    //     'oaddress',
    //     'oaddress2',
    //     'dname',
    //     'demail',
    //     'dphone',
    //     'dphone2',
    //     'dphone3',
    //     'daddress',
    //     'daddress2',
    //     'add_info',
    //     'yourname',
    //     'signature',
    //     'confirm',
    //     'card_name',
    //     'card_last_name',
    //     'billing_address',
    //     'b_city',
    //     'b_state',
    //     'b_zip',
    //     'card_type',
    //     'card_number',
    //     'card_sec',
    //     'card_exp',
    //     'card_mm',
    //     'card_yyyy',
    //     'deposit',
    //     'amount_charged',
    //     'pay_carrier',
    //     'review_clicked',
    //     'weight',
    //     'cstate',
    //     'czip',
    //     'ccity',
    //     'type',
    //     'pickup_date',
    //     'delivery_date',
    //     'pickup_when',
    //     'delivery_when',
    //     'cod_cop',
    //     'payment_method',
    //     'tran_id',
    //     'cod_cop_loc',
    //     'balance',
    //     'balance_method',
    //     'balance_time',
    //     'terms',
    //     'additional_2',
    //     'vin_num',
    //     'vehicle_opt',
    //     'port_title',
    //     'portterminal',
    //     'paneltype',
    //     'payment_type',
    //     'send_mail',
    //     'main_ph',
    //     'mainPhNum',
    //     'custName',
    //     'addInfo',
    //     'emp_id',
    //     'booking_confirm',
    //     'company_name',
    //     'company_price',
    //     'cname',
    //     'carrier_zip',
    //     'mc',
    //     'company_contact',
    //     'caddress',
    //     'company_address_2',
    //     'cphone',
    //     'cphone2',
    //     'company_cell',
    //     'company_fax',
    //     'driver_first_name',
    //     'driver_last_name',
    //     'driver_phone',
    //     'acknowledge',
    //     'comments',
    //     'email_time',
    //     'signature_style',
    //     'delete_reason',
    //     'cancel_reason',
    //     'pay_missing',
    //     'change_price_count',
    //     'welcome',
    //     'book_confirm_email',
    //     'last_price',
    //     'change_price_email',
    //     'dealer_name',
    //     'vl8',
    //     'vin',
    //     'thank_you_email',
    //     'old_signature_style',
    //     'old_signature',
    //     'old_signature_name',
    //     'already_card',
    //     'customer_status',
    //     'trans_method',
    //     'transcation',
    //     'trans_type',
    //     'trans_amount',
    //     'relist_id',
    //     'own_reason',
    //     'listed',
    //     'driver_price',
    //     'load_method',
    //     'unload_method',
    //     'listed_comments',
    //     'send_listed',
    //     'pay_carrier_listed',
    //     'listing_url',
    //     'assign_comments',
    //     'carrier_id',
    //     'accept_dispatch',
    //     'dispatch_comments',
    //     'titles',
    //     'dock_receipt',
    //     'vehicle_pickedup',
    //     'pickedup_comments',
    //     'owes_money',
    //     'owes_pay_type',
    //     'location',
    //     'method',
    //     'owes_transaction',
    //     'owes_comments',
    //     'owes_doc',
    //     'vehicle_delivered',
    //     'delivered_comments',
    //     'vehicle_completed',
    //     'completed_comments',
    //     'dispatch_cancel_reason',
    //     'insurance_certificate',
    //     'price_on',
    //     'price_by',
    //     'amount',
    //     'go_status',
    //     'move_listed_comment',
    //     'send_authorization',
    //     'urgent_count',
    //     'cash_status',
    //     'paypal_transcation',
    //     'cheque',
    //     'payment_update',
    //     'emp_role',
    //     'other_status',
    //     'est_pick_date',
    //     'est_delivery_date',
    //     'asking_low',
    //     'mfollow',
    //     'intrested',
    //     'paid_amount',
    //     'paid_status',
    //     'need_deposit',
    //     'deposit_amount',
    //     'import_comments',
    //     'status_user_id',
    //     'status_updated_at',
    //     'carrier_status',
    //     'created_at',
    //     'updated_at',
    //     'czsc',
    //     'cemail',
    //     'listed_price',
    //     'driver_pickup_date',
    //     'driver_deliver_date',
    //     'dispatcher_id',
    //     'completer_id',
    //     'countt',
    //     'pay_confirmed',
    //     'vehicle',
    //     'paid_by_user',
    //     'paid_by_customer',
    //     'recived_by',
    //     'recived_date',
    //     'date_of_booked',
    //     'confirm_by',
    //     'comfirm_date',
    //     'by_many',
    //     'approaching_time',
    //     'approaching_reason',
    //     'payment_method2',
    //     'owes_reminder',
    //     't_q_late',
    //     'additional',
    //     'approval_reason',
    //     'vehicle_available_date',
    //     'key_has',
    //     'order_taker_id',
    //     'company_comments',
    //     'v_con_d',
    //     'v_con_p',
    //     'reason_box',
    //     'port_dock_type',
    //     'port_line',
    //     'pay_comments',
    //     'payment_status',
    //     'old_code',
    //     'owes',
    //     'approve_deliver',
    //     'approve_pickup',
    //     'schedule_approve',
    //     'delivery_boy_id',
    //     'manager_id',
    //     'manager_ot_ids',
    //     'coupon_id',
    //     'roro',
    //     'storage_id',
    //     'storage_date',
    //     'storage_move_date',
    //     'storage_charge',
    //     'already_auction_storage',
    //     'already_storage',
    //     'already_storage_date',
    //     'already_storage_end_date',
    //     'late_pickup_auction_storage',
    //     'late_pickup_storage',
    //     'late_pickup_storage_date',
    //     'late_pickup_storage_end_date',
    //     'pickup_carrier_id',
    //     'start_price',
    //     'storage_fees',
    //     'pay_by',
    //     'other_fees',
    //     'we_us_driver',
    //     'miles',
    // ];

    protected $dates = ['updated_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : null;
    }

    public function getFieldValuesWithUserNameAttribute()
    {
        $fieldValuesWithUserName = [];

        foreach ($this->field_values as $fieldValue) {
            $fieldValuesWithUserName[] = [
                'value' => $fieldValue['value'],
                'updated_at' => $fieldValue['updated_at'],
                'user_name' => $fieldValue['user_id'] ? $this->user->name : null,
            ];
        }

        return $fieldValuesWithUserName;
    }
}
