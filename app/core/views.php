<?php
// This file manage our web app logic 


function download_pdf($file)
{
    // download pdf

    header('Content-Type: application/pdf');
    readfile($file);
}

function form_submission()
{
    require(__DIR__ . '/../database/models.php');
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method == 'POST') {

        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $born_date = $_POST['born_date'];
        $profession = $_POST['profession'];
        $sex = $_POST['sex'];
        $country = $_POST['country'];
        $town = $_POST['town'];
        $born_at = $_POST['born_at'];
        $adress = $_POST['adress'];
        $phone = $_POST['phone'];
        $t_name = $_POST['t_name'];
        $t_profession = $_POST['t_profession'];
        $continent = $_POST['continent'];
        
        $model_obj = new model();
        
        $table = 'submission';
        $fields = 'fullname, age, born_date, profession, sex, country, town, born_at, adress, phone, t_name, t_profession, continent';
        $value = '?,?,?,?,?,?,?,?,?,?,?,?,?';
        $data = '' . $fullname . '%' . $age . '%' . $born_date . '%' . $profession . '%' . $sex . '%' . $country . '%' . $town . '%' . $born_at . '%' . $adress . '%' . $phone . '%' . $t_name . '%' . $t_profession . '%' . $continent . '';
        
        try{
            $db_request = $model_obj->create($table, $fields, $value, $data);
        
        
            header("Content-Type: application/json");
            http_response_code(201);

        echo json_encode([
            'message' => 'created successfully '.$db_request
        ]);
        }
        catch(Exception $e){
            http_response_code(500);
            echo json_encode([
              
                'message' => $e
            ]);
        }
       
        
    }
  
}

function get_submission(){
    require(__DIR__ . '/../database/models.php');
    $request_method = $_SERVER['REQUEST_METHOD'];
    if($request_method=='GET'){
    
        if(isset($_GET['id']))
        {
            
        $model_obj = new model();
        $table = 'submission';
        $field = '*';
        $sfield='id';
        $value = $_GET['id'];
        
        try{
            $request = $model_obj->read_filter_once($table, $field, $sfield, $value);
            
            $obj = $request->fetch();
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode(
                [
                    'id' => $obj['id'],
                    'fullname' => $obj['fullname'],
                    'age' => $obj['age'],
                    'born_date' => $obj['born_date'],
                    'profession' => $obj['profession'],
                    'sex' => $obj['sex'],
                    'country' => $obj['country'],
                    'town' => $obj['town'],
                    'born_at' => $obj['born_at'],
                    'adress' => $obj['adress'],
                    'phone' => $obj['phone'],
                    't_name' => $obj['t_name'],
                    't_profession' => $obj['t_profession'],
                    'continent' => $obj['continent'],
                     ]
            );
        }
        catch(Exception $e){
            header('Content-Type: application/json');
            http_response_code(404);
            json_encode(['message'=>$e]);
        }
        }


    }
}

function get_all(){
    require(__DIR__ . '/../database/models.php');
    $request_method = $_SERVER['REQUEST_METHOD'];
    if($request_method=='GET'){
    
      
            
        $model_obj = new model();
        $table = 'submission';
        $field = '*';
       
        
        try{
            $request = $model_obj->read($table, $field);
            $data = [];
           while( $obj = $request->fetch()){

            array_push($data,    [
                'id' => $obj['id'],
                'fullname' => $obj['fullname'],
                'age' => $obj['age'],
                'born_date' => $obj['born_date'],
                'profession' => $obj['profession'],
                'sex' => $obj['sex'],
                'country' => $obj['country'],
                'town' => $obj['town'],
                'born_at' => $obj['born_at'],
                'adress' => $obj['adress'],
                'phone' => $obj['phone'],
                't_name' => $obj['t_name'],
                't_profession' => $obj['t_profession'],
                'continent' => $obj['continent'],
            ]);

           }
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode(
              $data
            );
        }
        catch(Exception $e){
            header('Content-Type: application/json');
            http_response_code(404);
            json_encode(['message'=>$e]);
        }
      

    }
}
 

//author: @henrid3v
