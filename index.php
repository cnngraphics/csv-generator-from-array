
<html>
    <head>  
        <title>test</title>
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
    </head>

    <body>   
        <h1>heDER MAIN HEERD</h1> 
            <form action="" method="POST">
                <textarea name="paragaraph" id="" cols="30" rows="10">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, soluta autem. 
            Delectus quis enim sunt obcaecati voluptatem porro minus, accusamus quae blanditiis 
            totam incidunt provident esse repellendus fugit! Et, inventore!
                </textarea>
                <br>
                <input type="submit" value="Save" name="submit">
            </form>
            <p></p>
        
        
    </body>

</html>

<?php

// print_r($_POST);



ini_set( 'error_reporting', E_ALL);

    $thingsToWrite = array(
        "Fruits,Animals,Vehicles",
        "Banana,Lion,Car",
        "grape, Giraffe,Truck",
        "grapes, Horse,Plane"
    );

    if( isset($_POST['submit'])) {
        try {
            $newfile = fopen('testfile'.date('m-d-Y-His').'.csv', "w") or die("Can't create new file");
            $rowCounts = 0;
            foreach($thingsToWrite as $row){
                $rowCounts++;
                //need to break row into elements,
                $item= explode(',', $row);
                // trim "" cleanup, 
                $cleanedArray = [];
                foreach($item as $dirty){
                    $cleanedItem = trim($dirty)."";
                    array_push($cleanedArray, $cleanedItem);
                }
                fputcsv( $newfile, $cleanedArray );
                

            }
            fputcsv( $newfile, ['','TOTAL ROWS',$rowCounts] );
        } catch ( Exception $e) {
            echo $e->getMessage();
        }
         
        fclose($newfile);
    }




// ini_set( 'error_reporting', E_ALL);

//     if( isset($_POST['submit'])) {
//         try {
//             $newfile = fopen('testfile.doc', "a") or die("Can't create new file");
//             print_r($newfile);
//             fwrite( $newfile, $_POST['paragaraph']);
//         } catch ( Exception $e) {
//             echo $e->getMessage();
//         }
         
//         fclose($newfile);
//     }



?>