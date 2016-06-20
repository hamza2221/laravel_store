<?php

namespace App\emailers;
use Mail;
use App\User;

class EmailHelper {

    public function sendCompanyEmails($company_name) {
        $user = User::select('name', 'email')->where('company_update', '=', 1)->get();
		
		 if(count($user)>0){
			foreach($user as $i){
				Mail::send('emails.new_company', ['user' => $i,'company_name' => $company_name], function ($m) use ($i) {
				$m->from('admin@researchwork.io', 'Laravel Emailing');
				$m->to($i->email, $i->name)->subject('Company Updates!');
				});
			}
		}
        
    }
    public function sendCompanySectors($sector_name) {
        $user = User::select('name', 'email')->where('sector_update', '=', 1)->get();
		
		 if(count($user)>0){
			foreach($user as $i){
				Mail::send('emails.new_company', ['user' => $i,'comp    any_name' => $sector_name], function ($m) use ($i) {
				$m->from('admin@researchwork.io', 'Laravel Emailing');
				$m->to($i->email, $i->name)->subject('Sector Updates!');
				});
			}
		}
        
    }

}
