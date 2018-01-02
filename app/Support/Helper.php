<?php
namespace App\Support;

class Helper{
  public static function parent($data,$select,$parent = 0, $str="--"){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["categories"];
            if ($val["parent_id"] == $parent){
                if ($id == $select) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                $this->parent ($data,$select,$id,$str."--");
            }
        }
    }
    //
    public static function parentMulti($data,$select,$parent = 0, $str="--"){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["categories"];
            if ($val["parent_id"] == $parent){
                if ($id == $select) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                $this->parentMulti ($data,$select,$id,$str."--");
            }
        }
    }
    //parent_add
    public static function parentAdd($data, $parent = 0, $str="--"){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["categories"];
            if ($val["parent_id"] == $parent){
                if ($id == old('parent_id')) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                $this->parentAdd($data,$id,$str."--");
            }

        }
    }
    public static function parentAddMulti($data, $parent = 0, $str="--"){
        foreach ($data as $val ){
            $id = $val["id"];
            $name = $val["categories"];
            if ($val["parent_id"] == $parent){
                if ($id == old('category_id')) {
                    echo "<option value='$id' selected='selected'>$str $name </option>";
                }else{
                    echo "<option value='$id'> $str $name</option>";
                }
                $this->parentAddMulti($data,$id,$str."--");
            }

        }
    }
    //parent_table
    public static function parentTable($data, $parent = 0, $str=""){
        $i=1;
        foreach ($data as $val ){
            if ($val->parent_id == $parent){
                 echo "<tr>";
                    echo "<td class='text-center'>".$i."</td>";
                    echo "<td>".$str.$val->categories."</td>";
                    echo "<td class='text-center'>".$val->menu."</td>";
                    echo "<td class='text-center'>".$val->description."</td>";
                    echo "<td class='text-center'>".$val->alias."</td>";
                    echo "<td class='text-center'>".$val->sort."</td>";
                    if($val->active==1){
                          echo "<td class='text-center
                    '><span style='width:50px' class='btn btn-success'>".Config('constants.active')[$val->active]."</span></td>";
                    }else{
                    echo "<td class='text-center
                    '><span style='width:50px' class='btn btn-danger'>".Config('constants.active')[$val->active]."</span></td>";
                 }
                    echo "<td class='text-center'>
                        <a href='".route('categories.edit',$val->id)."'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i>
                  </a>
                  <a href='".route('categories.delete',$val->id)."' class='delete-view'><i class='fa fa-times-circle fa-lg'></i></a>
                    </td>";
                 echo "</tr>";
              $this->parentTable($data,$val->id,$str."<i class='fa fa-minus' aria-hidden='true'>&nbsp;&nbsp;</i> ");
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