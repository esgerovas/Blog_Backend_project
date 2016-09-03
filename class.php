<?php
	
	class Operation
	{	

		public function header($str){
			$hstr=substr($str, 0,strpos($str, "</h")+5);
			return $hstr;
		}
		public function subheader($str){
			$pstr = Operation::maintext($str);
			$pos = strpos($pstr,'</p>')+4;
			if($pos>200){
				$substr = substr($pstr, 0, $pos);
			}else{
				$pos = strpos($pstr,'</p>', 204)+4;
				$substr = substr($pstr, 0, $pos);
			}
			return $substr;
		}
		public function maintext($str){
			$content_pos = strpos($str, "</h")+6;
			$pstr=substr($str,$content_pos);
			return $pstr;
		}

		public function pass_date($date){
			$ref_date = $date;
			$now_date = date("Y-m-d H:i:s");

			$ref_date = new DateTime($ref_date);
			$now_date = new DateTime($now_date);
			$diff = $now_date->diff($ref_date);

			if($diff->y !=0){
				$time = $diff->y." il";
			}else if($diff->m !=0){
				$time = $diff->m." ay";
			}else if($diff->d !=0){
				$time = $diff->d." gün";
			}else if($diff->h !=0){
				$time = $diff->h." saat";
			}else if($diff->i !=0){
				$time = $diff->i." dəqiqə";
			}else{
				$time = $diff->s." saniyə";
			}
			return $time;
		}
	}


?>