<?php
	class Creature
	{
		/* Creature Variables*/
		public $id;
		public $name;
		public $iv;
		public $hp;
		public $currHp;
		public $str;
		public $dex;
		public $con;
		public $intel;
		public $wis;
		public $cha;
		public $speed;
		public $ac;
		public $skills;
		public $actions;
		
		/* Creature Constructors */
		function __construct($name, $iv, $hp, $id){
			$this->name = $name;
			$this->iv = $iv;
			$this->hp = $hp;
			$this->currHp = $hp;
			$this->id = $id;
		}
		
		/* Creature Functions */
		
		/* Set_IV - sets new iv for creature */
		function set_iv($newIV){
			$this->iv = $newIV;
		}
		
		/* Set_Curr_HP - sets new HP for creature */
		function set_curr_hp($newHP){
			$this->currHp = $newHP;
		}
	}
?>