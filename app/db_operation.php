<?php
ob_start();
function db_row_count($query){
    $sql = "SELECT * FROM {$query["table"]}";
    if(!empty($query['where'])){
        $sql.=" WHERE {$query['where']}";
    }

    $query["conn"]->query($sql);
    if($query["conn"]->affected_rows){
        return $query["conn"]->affected_rows;
    }
    return 0;
}
/*
        this function return total row count of the db table(number of rows in database )
*/
// `register_id` = {$data["id"]}
function get_data_by_id($data){
    $get_res = $data["conn"]->query("SELECT * FROM {$data["table"]} WHERE {$data['where']}");
    $row_data= $get_res->fetch_assoc();
    return $row_data;
}
/*
        this function return only donar id
*/
function set_colms($query){
    return str_replace("*",implode(",",$query['cols']),$query['sql']);
}
/*
        create the query of the colms name of the db table
*/
function where($query){
    $sql = $query['sql'];
    $sql.=" WHERE {$query['where']}";
    
    return $sql;
}
/*
        create a query with where
*/
function select($query){
    $sql = "SELECT * FROM {$query['table']}";
    if(!empty($query['cols'])){
        $sql = set_colms([
            'cols'=>$query['cols'],
            'sql'=>$sql
        ]);
    }
    if(!empty($query['join'])){
        if(array_key_exists("type",$query['join'])){
        $sql = joining([
            'table' => $query['table'],
            'sql'=>$sql,
            'join'=>$query['join']
            ]);
        }else{
            $sql = multi_join([
                'table' => $query['table'],
                'sql'=>$sql,
                'join'=>$query['join']
            ]);
        }   
            
    }
    if(!empty($query['where'])){
        $sql = where([
            'sql' => $sql,
            'table' => $query['table'],
            'where' => $query['where']
        ]);
    }
    $param = [
        'conn' =>$query['conn'],
        'sql' => $sql
    ];
    $data = run_query($param);
    if(count($data) === 1){
        return $data[0];
    }
    return run_query($param);
}
/*
        select data
*/
function run_query($query){
    $data = [];
    $response = $query['conn']->query($query['sql']);
    if($query['conn']->affected_rows){
       return $response->fetch_all(MYSQLI_ASSOC);
    }
    return $response;
}
/*
        run the query
*/
function order_by(){

}

function joining($query){
    $sql = $query['sql'];
    $sql.=" {$query['join']['type']} {$query['join']['table']} ON {$query['table']}.{$query['join']['on'][0]} = {$query['join']['table']}.{$query['join']['on'][1]}";
    return $sql;
}
/*
    this function create a query for joining and return it 
*/ 

function multi_join($query){
    $sql = $query['sql'];
    for($i=0;$i<count($query['join']);$i++){
       $sql.=" {$query['join'][$i]['type']} {$query['join'][$i]['table']} ON {$query['table']}.{$query['join'][$i]['on'][0]} = {$query['join'][$i]['table']}.{$query['join'][$i]['on'][1]}";

   }
   return $sql;
}
function test($q){
    echo "<pre>";
    print_r($q);
    
    echo "</pre>";
}
function tab_option_need_blood_request_count($query)
{
    $sql = "SELECT * FROM need_blood";
    $data = [];
    $pending = 0;
    $cancel = 0;
    $reject = 0;
    $accept = 0;
    if(!empty($query['where'])){
        $sql.=" WHERE {$query['where']}";
    }
    $total_request_res = $query["conn"]->query($sql);
    $total = $query["conn"]->affected_rows;
    $data['total_request'] = $total;
    if ($total) {
        while ($res = $total_request_res->fetch_object()) {
            if ($res->request_status === "pending") {
                $pending++;
            } else if ($res->request_status === "cancel") {
                $cancel++;
            } else if ($res->request_status === "reject") {
                $reject++;
            } else if ($res->request_status === "accept") {
                $accept++;
            }
        }
    }
    $data['pending'] = $pending;
    $data['cancel'] = $cancel;
    $data['accept'] = $accept;
    $data['reject'] = $reject;
    return $data;
}
/* 
    this is for blood bank dashboard need blood tab option
*/


function tab_option_blood_donation_request_count($query)
{
    $data = [];
    $pending = 0;
    $cancel = 0;
    $reject = 0;
    $accept = 0;
    // get donar id
    $get_donar_result = $query["conn"]->query("SELECT * FROM `donar` WHERE `register_id` = {$query['id']}");
    $donar_data = $get_donar_result->fetch_assoc();
    // $donar_data = get_data_by_id($query);
    $total_request_res = $query["conn"]->query("SELECT * FROM blood_donate WHERE donar_id = {$donar_data['donar_id']}");
    $total = $query["conn"]->affected_rows;
    $data['total_request'] = $total;
    if ($total) {
        while ($res = $total_request_res->fetch_object()) {
            if ($res->status === "pending") {
                $pending++;
            } else if ($res->status === "cancel") {
                $cancel++;
            } else if ($res->status === "reject") {
                $reject++;
            } else if ($res->status === "accept") {
                $accept++;
            }
        }
    }
    $data['pending'] = $pending;
    $data['cancel'] = $cancel;
    $data['accept'] = $accept;
    $data['reject'] = $reject;
    return $data;
}
/*
    tab menu for blood _donation tab menu
*/ 


function pagination($q){
    $param = [
        'conn'=>$q['conn'],
        'table'=>$q['table'],
    ];
    if(!empty($q['where'])){
        $param['where'] = $q['where'];
    }
    // get the initial page number
    
    $initial_page = (intval($q['page_number'])-1) * intval($q['limit']);
    // get the total rows of the table
    $total_rows = db_row_count($param); 
    // get the required number of pages
    $total_pages = ceil ($total_rows / intval($q['limit'])); 
    // echo $q['page_number'];

    return [
        "initial_page" => $initial_page,
        "total_pages" => $total_pages
    ];
}
/*
        pagination 
        $q['conn'],intval($q['limit']),intval($q['page_number']),$q['table']
*/

function getPaginationResults($query){
    $data=[];
    $sql = "SELECT * FROM {$query['table']}";
    if(!empty($query['cols'])){
        // $sql = str_replace("*",implode(",",$query['cols']),$sql);
        $sql = set_colms([
            'cols' =>$query['cols'],
            'sql' => $sql
        ]);
    }
    if(!empty($query['join'])){
        if(array_key_exists("type",$query['join'])){
           
            $sql.=" {$query['join']['type']} {$query['join']['table']} on {$query['table']}.{$query['join']['on'][0]} = {$query['join']['table']}.{$query['join']['on'][1]}";
            }else{
                $sql = multi_join([
                    'table' => $query['table'],
                    'sql'=>$sql,
                    'join'=>$query['join']
                ]);
            }   
    }
    // SELECT * FROM need_blood INNER JOIN blood_group on need_blood.blood_group_id = blood_group.blood_group WHERE patient_id = 7 LIMIT 0,3
    if(!empty($query['where'])){
        $sql.=" WHERE {$query['where']}";
    }
    if(!empty($query['order_by'])){
        $sql .=" ORDER BY {$query['order_by']['col']} {$query['order_by']['order']}";
    }
    if(!empty($query['pagination'])){
        $param = [
            'conn' => $query["conn"],
            'table' => $query['table'],
            'limit' =>$query['pagination']['limit'],
            'page_number' => intval($query['pagination']['page_number']),
        ];
        if(!empty($query['where'])){
            $param['where'] = $query['where'];
        }
        $pagination_result = pagination($param);
        $sql.=" LIMIT {$pagination_result['initial_page']},{$query['pagination']['limit']}";
        $data['total_pages'] = $pagination_result['total_pages'];

    }
    
    $result = $query["conn"]->query($sql);
    if($query["conn"]->affected_rows){
        $data['results']= $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    $query["conn"]->affected_rows;
}

// function get_data_all($query){
//     $data=[];
//     $sql = "SELECT * FROM {$query['table']}";
//     $result = $query['conn']->query($sql);
//     if($query["conn"]->affected_rows){
//         $data= $result->fetch_all(MYSQLI_ASSOC);
//         return $data;
//     }
//     $query["conn"]->affected_rows;
// }
/*
    it will fetch all data from table
*/ 




