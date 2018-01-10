<?php
namespace App\Support;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class Helper{
  public static function parent($data,$select,$parent = 0, $str=""){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($id == $select) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                self::parent ($data,$select,$id,$str."--|");
            }
        }
    }
    //
    public static function parentMulti($data,$select,$parent = 0, $str=""){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($id == $select) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                self::parentMulti ($data,$select,$id,$str."--|");
            }
        }
    }
    //parent_add
    public static function parentAdd($data, $parent = 0, $str=""){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($id == old('parent_id')) {
                    echo "<option value='$id' selected='selected'>$name </option>";
                }else{
                    echo "<option value='$id'> $str$name</option>";
                }
                self::parentAdd($data,$id,$str."--|");
            }

        }
    }
    public static function parentAddMulti($data, $parent = 0, $str=""){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($id == old('category_id')) {
                    echo "<option value='$id' selected='selected'>$name </option>";
                }else{
                    echo "<option value='$id'> $str$name</option>";
                }
               self::parentAddMulti($data,$id,$str."--|");
            }

        }
    }
    public static function parentFilterMulti($data,$select,$parent = 0, $str=""){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($id == $select) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                self::parent ($data,$select,$id,$str."--|");
            }
        }
    }

    public static function parentTableCategories($data, $parent = 0, $str=""){
        $i=1;
        foreach ($data as $val ){
            if ($val->parent_id == $parent){
                echo "<tr>";
                echo "<td class='text-center'>".$i."</td>";
                echo "<td>".$str.$val->name."</td>";
                echo "<td class='text-center'>".$val->parent_id."</td>";
                echo "<td class='text-center'>".Config::get('constant.category_type')[$val->category_type]."</td>";
                if($val->status==1){
                    echo "<td class='text-center
                    '><span class='btn btn-success'>Hiển thị</span></td>";
                }else{
                    echo "<td class='text-center
                    '><span  class='btn btn-danger'>Ẩn</span></td>";
                }
                echo "<td class='text-center'>
                        <a href='".URL::route('categories.edit',[$val->id])."' class='btn btn-success'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i>
                  </a>
                  <a href='".URL::route('categories.delete',[$val->id])."' class='btn btn-danger delete-item'><i class='fa fa-times-circle fa-lg'></i></a>
                    </td>";
                echo "</tr>";
                self::parentTableCategories($data,$val->id,$str."<i class='fa fa-minus' aria-hidden='true'>&nbsp;&nbsp;</i> ");
            }
            $i++;
        }
    }
    //support
    public static function getTimeSearch($time, $defaultTime, $requestStartDate, $requestEndDate){
        if ($time == 1) {
            switch ($defaultTime)
            {
                case 'this_month':
                    $startDate = date('Y-m-d 00:00:00', strtotime('first day of this month'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of this month'));
                    break;
                case 'last_month':
                    $startDate = date('Y-m-d 00:00:00', strtotime('first day of last month'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    break;
                case 'today':
                    $startDate = date('Y-m-d 00:00:00');
                    $endDate   = date('Y-m-d 23:59:59');
                    break;
                case 'yesterday':
                    $startDate = date('Y-m-d 00:00:00', time() - 86400);
                    $endDate   = date('Y-m-d 23:59:59', time() - 86400);
                    break;
                case 'this_week':
                    $startDate = date('Y-m-d 00:00:00', strtotime('monday this week'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('sunday this week'));
                    break;
                case 'last_week':
                    $startDate = date('Y-m-d 00:00:00', strtotime('monday last week'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('sunday last week'));
                    break;
                case 'this_year':
                    $startDate = date('Y-01-01 00:00:00');
                    $endDate   = date('Y-12-31 23:59:59');
                    break;
                case 'last_three_month':
                    $startmonth = date('Y-m-d 00:00:00',strtotime('first day of this month'));
                    $startDate = date('Y-m-d 00:00:00', strtotime('-3 month',strtotime($startmonth)));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    break;
                case 'last_six_month':
                    $startmonth = date('Y-m-d 00:00:00',strtotime('first day of this month'));
                    $startDate = date('Y-m-d 00:00:00', strtotime('-6 month',strtotime($startmonth)));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    break;
                case 'last_year':
                    $year = date('Y') - 1;
                    $start = "January 1st, {$year}";
                    $end = "December 31st, {$year}";
                    $startDate = date('Y-m-d 00:00:00', strtotime($start));
                    $endDate   = date('Y-m-d 00:00:00', strtotime($end));
                    break;
            }
        } elseif ($time == 2) {
            if (($requestStartDate == "")&&($requestEndDate == "")) {
                $startDate   = date('1970-01-01 00:00:00');
                $endDate     = date('9999-01-01 23:59:59');
            } elseif (($requestStartDate == "")&&(!$requestEndDate == "")) {
                $startDate   = date('1970-01-01 00:00:00');
                $eDate       = str_replace('/', '-', $requestEndDate);
                $endDate     = date('Y-m-d 23:59:59', strtotime($eDate));
            } elseif ((!$requestStartDate == "")&&($requestEndDate == "")) {
                $sDate       = str_replace('/', '-', $requestStartDate);
                $startDate   = date('Y-m-d 00:00:00', strtotime($sDate));
                $endDate     = date('Y-m-d 23:59:59');
            } else {
                $sDate       = str_replace('/', '-', $requestStartDate);
                $startDate   = date('Y-m-d 00:00:00', strtotime($sDate));
                $eDate       = str_replace('/', '-', $requestEndDate);
                $endDate     = date('Y-m-d 23:59:59', strtotime($eDate));
            }
        } else {
            $startDate  = date('Y-m-d 00:00:00', strtotime('first day of this month'));
            $endDate    = date('Y-m-d 23:59:59', strtotime('today'));
        }
        return ['start' => $startDate, 'end' => $endDate];
    }

}
?>