<?php

header('Access-Control-Allow-Origin: *');
$str = base64_decode($_GET['obj']);
$temp = explode('#',$str);
$select = array();
$campos = array();
foreach($temp AS $index=>$value){
    // obtengo el segundo valor para el item
    $rest = explode('|',$value);
    $select[] = str_replace('id:','',$rest[0]);
    $campos[] = array('id'=>str_replace('id:','',$rest[0]),
                    'type'=>str_replace('type:','',$rest[1]),
                    'align'=>str_replace('align:','',$rest[2]),
                    'sort'=>str_replace('sort:','',$rest[3]) ,
                    'value'=>str_replace('value:','',$rest[4])
                    );

}

        //set content type and xml tag
        //header("Content-type:text/json");
 

        //define variables from incoming values
        if(isset($_GET["posStart"]))
            $posStart = $_GET['posStart'];
        else
            $posStart = 0;
        if(isset($_GET["count"]))
            $count = $_GET['count'];
        else
            $count = 100;
 
        // Configuracion de la conexion
        $serverName = "localhost"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"test_crud2", "UID"=>"sa", "PWD"=>"s3rv3r..*");
		$link = sqlsrv_connect( $serverName, $connectionInfo);

		// Primero extraer la cantidad de registros
		$sqlCount = "Select count(*) as items FROM seg_usuarios";
	    $resCount = sqlsrv_query ($link,$sqlCount);
	    $rowCount=sqlsrv_fetch_object($resCount);


        //create query to products table
        $sql = implode(',',$select).", id FROM seg_usuarios";
 
        //if this is the first query - get total number of records in the query result
        $sqlCount = "SELECT * FROM (
				SELECT ROW_NUMBER() OVER( ORDER BY id ASC ) AS row, ".$rowCount->items." AS cnt, $sql ) AS sub";
        $resCount =sqlsrv_query($link,$sqlCount);
        $rowCount=sqlsrv_fetch_object($resCount);
        $totalCount = $rowCount->cnt;
 
        //add limits to query to get only rows necessary for the output
        $sqlCount.= " WHERE row>=".$posStart." AND row<=".$count;
 
 		$sqlCount;
      
        $res = sqlsrv_query($link,$sqlCount);
 
        //output data in XML format   
        $items = array();
        while($row=sqlsrv_fetch_object($res)){
        	$tmp['id'] = $row->id;
        	$tep = array();
        	foreach ($row as $key => $value) {
        		if($key!='id' AND $key!='cnt' AND $key!='row'){
        			$tep[] = $value;
        		}
        	}

        	$tmp['data'] = $tep;
            array_push($items,$tmp);
        }


        $valor = array();
        $valor['head']=$campos;
        $valor['rows']=$items;
        echo json_encode($valor);

?>

