<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Branch;
use App\Models\User;
use App\Models\Cluster;
use App\Models\Bank;

// PHP Mailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Application extends Model
{
    
    protected $table = 'applications';
    protected $guarded = ['id'];

    
    public function getDob($value)
    {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function getDistrictPre()
    {
        return $this->belongsTo(Districts::class, 'pre_district', 'ID');
    }

    public function getDivisionPre()
    {
        return $this->belongsTo(Divisions::class, 'pre_division', 'ID');
    }

    public function getDistrictPer()
    {
        return $this->belongsTo(Districts::class, 'per_district', 'ID');
    }

    public function getDivisionPer()
    {
        return $this->belongsTo(Divisions::class, 'per_division', 'ID');
    }

    public function getBankName()
    {
        return $this->belongsTo(Bank::class, 'bank_name', 'id');
    }

    public function getPreferredBranchName()
    {
        return $this->belongsTo(Branch::class, 'preferred_branch', 'T24_BR');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'rm_id', 'id');
    }

    public function getUserUpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function getCluster($cluster_id)
    {
        return Cluster::where('id',$cluster_id)->first()->cluster_name;
    }



    public function logs()
    {
        return $this->hasOne('App\Models\Forward_log')->latest();
    }

    public function getDateTime($value)
    {
        $d = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC')
            ->setTimezone('Asia/Dhaka')
            ->format('d M, Y h:i a');
        return $d;
    }

    public function createMarketingAssociateId($br)
    {
        //Year( 2 digit ) and Month( 2 digit )
        $yearAndMonthFormatted = Carbon::now()->format('ym');

        //BranchCode Last 2 digit
        $brFormatted = substr($br,7);

        //Current Number
        $currentNumber = DB::table('branch')->where('T24_BR',$br)->first()->BR_MR_ID_INC;
        $newNumber = $currentNumber+1 ;
       // $length = 4;
        DB::table('branch')
            ->where('T24_BR',$br)
            ->update(['BR_MR_ID_INC' => $newNumber]);
        // $newNumberStr = substr(str_repeat(0, $length).$newNumber, - $length);
	    $newNumberStr = sprintf( '%04d', $newNumber );

        return $yearAndMonthFormatted.$brFormatted.$newNumberStr;
    }

    public function sendMail($Application){
        $htmlView = view('mail.mail-body',compact('Application'))->render();
            
            require '../vendor/autoload.php'; // load Composer's autoloader
    
            $mail = new PHPMailer(true); // Passing `true` enables exceptions
            try {
                
                $mail->SMTPDebug = 4;                                                         //Enable verbose debug output
                $mail->isSMTP();                                                              //Send using SMTP
                $mail->Host = "192.168.200.20";                                               //Set the SMTP server to send through
                //$mail->SMTPAuth   = true;                                                   //Enable SMTP authentication
                $mail->Username = "padmaclick@padmabankbd.com";                               // SMTP username
                $mail->Password = "Ab1234#$";                                                 // SMTP password
                //$mail->SMTPSecure = false;//PHPMailer::ENCRYPTION_STARTTLS;                 //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                
                $mail->SMTPSecure = false;
                $mail->SMTPAutoTLS = false;
    
                $mail->Port       = 25;                                                       //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom("office.jobayed@gmail.com", env('MAIL_FROM_NAME') );
                $mail->addAddress($Application['email'], $Application['name'] );    //Add a recipient
                
                //Content
                $mail->isHTML(true);                                                         //Set email format to HTML
                $mail->Subject = 'Padma Marketing Associate :: Registration Successful';
                $mail->Body    = $htmlView;
                $mail->AltBody = '';
                
                $mail->send();
                
    
            } catch (Exception $e) 
            {
                return redirect()->back()->with('msg-error' ,'Mail Not Sent');
            }
    }

}
