<?php 
    /**
     * push a new Task in the JSON.file
     * 
     * @param string $Task the new item(Task)
     * @param array $JSON_decode(list_Todo) the Todo list downloaded from the JSON.file
     * @return array $newArray l'array modificato
     */
    function pushTask($post, $array) {
        $item = $post;
        $done = false;
        $obj = [
            "item" => $item,
            "done" => $done
        ];

        array_push($array['data'], $obj);
        return $array;
    };

    /**
     * switch between Completed and NotCompleted Task
     * 
     * @param number $Index the index of the Task to switch
     * @param array $JSON_decode(list_Todo) the Todo list downloaded from the JSON.file
     * @return array $newArray l'array modificato
     */
    function isCompleted($post, $array) {
        $index = $post;
        $array['data'][$index]['done'] = !$array['data'][$index]['done'];

        return $array;
    };

    /**
     * Remove the selected Task
     * 
     * @param number $Index the index of the Task to Remove
     * @param array $JSON_decode(list_Todo) the Todo list downloaded from the JSON.file
     * @return array $newArray l'array modificato
     */
    function removeTask($post, $array) {
        $index = $post;
        array_splice($array['data'], $index, 1);

        return $array;
    };

    /**
     * ReEdit the selected Task
     * 
     * @param array $object the associative array with the $Index and the $TaskModified to ReEdit
     * @param array $JSON_decode(list_Todo) the Todo list downloaded from the JSON.file
     * @return array $newArray l'array modificato
     */
    function reEditTask($post, $array) {
        $test = json_decode($post, true);
        $index = $test['editIndex'];
        $string = $test['editItem'];
        $array['data'][$index]['item'] = $string;

        return $array;
    };
?>