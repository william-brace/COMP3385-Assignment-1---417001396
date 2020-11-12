<?php
namespace Apps\handlers;

use Framework\Observable_Model;

class IndexModel extends Observable_Model {

    public function findAll(): array {

        $connection = $this->makeConnection();

        $getPopularQuery = "SELECT * FROM courses ORDER BY course_access_count DESC LIMIT 8";

        $getPopularQuery_result = mysqli_query($connection, $getPopularQuery);

        if (!$getPopularQuery_result) {
            die("Get popular courses from courses table failed! " . mysqli_error($connection));
        }
        else
        {
            //echo 'Get popular course query is a sucess';
            
            

            //var_dump($popular);
            
        }
        $popular = mysqli_fetch_all($getPopularQuery_result);


        $getRecommendedQuery = "SELECT * FROM courses ORDER BY course_recommendation_count DESC LIMIT 8";

        $getRecommendedQuery_result = mysqli_query($connection, $getRecommendedQuery);

        if (!$getRecommendedQuery_result) {
            die("Get Recommended courses from courses table failed! " . mysqli_error($connection));
        }
        else
        {
            //echo 'Get Recommended course query is a sucess';
            
            

            //var_dump($Recommended);
            
        }

        $recommended = mysqli_fetch_all($getRecommendedQuery_result);

        return ['popular'=>$popular, 'recommended'=>$recommended];

        


        // $getExercisesQuery = "SELECT * FROM exercise where workoutID = '$curWorkoutID'";

        // $getExercisesQuery_result = mysqli_query($connect, $getExercisesQuery);

        // if (!$getExercisesQuery_result)
        // {
        //     die("QUERY TO GET ALL EXERCISES FROM EXERCISE TABLE WITH MATCHING WORKOUTID FAILED! " . mysqli_error($connect));
        // }
        // else 
        // {   

        //     $exercises = array();

        //     while ($exerciseRow = mysqli_fetch_assoc($getExercisesQuery_result))

        

        // $data = $this->loadData(DATA_DIR . '/courses.json');

        // //get most popular and top recommenrded
        // $popular_column =  array_column($data['courses'], 3);
        // $recommended_column = array_column($data['courses'],2);

        // $dataCopy = $data['courses'];

        // array_multisort($recommended_column, SORT_DESC, $data['courses']);
        // $recommended = array_slice($data['courses'], 0, 8);

        // array_multisort($popular_column, SORT_DESC, $dataCopy);
        // $popular = array_slice($dataCopy, 0, 8);

        // return ['popular'=>$popular, 'recommended'=>$recommended];


    }


    public function findRecord(string $id) : array {
        return [];
    }


}