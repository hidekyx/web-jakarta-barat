<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as datetime;

class GlobalFunction
{	
	static public function reduction_in_death(){
		$query_results = DB::Table('adinet')->select('country',DB::RAW("sum(dead) as dead"))->whereRaw("DATE_PART('year',date)>=2016 AND DATE_PART('year',date)<=2020")
			->groupBy('country')
			->orderby('country','asc')->get();
		foreach ($query_results as $value) {
			$value->dead = (($value->dead * 100) / 100000);
		}
		return $query_results;
	}
}