<?php

function set_tanggal($tgl)
{
	return date('d/m/Y',strtotime($tgl));
}

function set_number($number)
{
	return number_format($number,2,',','.');
}

function multiexplode($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
} 
function cmb_dinamis($name,$table,$field,$field2,$pk,$selected,$ket){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control form-control-sm' style='width: 100%;'>";
    $data = $ci->db->get($table)->result();
    $cmb .="<option value='' selected> -- ".$ket." --<option>";
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field." - ".$d->$field2."</option>";
    }
    $cmb .="</select>";

    return $cmb;  
}

function cmb_dinamis_sel($name,$table,$field,$field2,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control form-control-sm' style='width: 100%;'>";
    $data = $ci->db->get($table)->result();
    $cmb .="<option value=''> ---- <option>";
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field." - ".$d->$field2."</option>";
    }
    $cmb .="</select>";

    return $cmb;  
}

function cmb_dinamis_yt($name,$selected){
    $cmb = "<select name='$name' class='form-control form-control-sm' requierd='' style='width: 100%;'>";
    if($selected == "Y"){$w = "";}elseif($selected == "T"){$w = "selected";};
    $cmb .= "<option value='Y'".$w."> Lunas </option>";
    $cmb .= "<option value='T'".$w."> Belum Lunas </option>";
    $cmb .="</select>";

    return $cmb;  
}