<?php
class IndexModel extends Observable_Model {

    public function getAll(): array {

        $data = $this->loadData(DATA_DIR . '/courses.json');

        //get most popular and top recommenrded
        $popular_column =  array_column($data['courses'], 3);
        $recommended_column = array_column($data['courses'],2);

        $dataCopy = $data['courses'];

        array_multisort($recommended_column, SORT_DESC, $data['courses']);
        $recommended = array_slice($data['courses'], 0, 8);

        array_multisort($popular_column, SORT_DESC, $dataCopy);
        $popular = array_slice($dataCopy, 0, 8);

        return ['popular'=>$popular, 'recommended'=>$recommended];


    }

    public function getRecord(string $id): array {
        return [];
    }

}