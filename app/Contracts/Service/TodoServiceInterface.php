<?php

namespace App\Contracts\Service;

/**
 * Interface for todo service
 */
interface TodoServiceInterface
{
    /**
     * get todo data from table
     * 
     * @return array $todoList Todo list
     */
    public function getTodoList();

    /**
     * Store todo data to table
     *
     * @param request $name name with inputs
     * @param request $instruction instruction with inputs
     * @return Object $post saved todo
     */
    public function saveTodo($name, $instruction);

    /**
     * Update post data to table
     *
     * @param request $request request with inputs
     * @param $id id with inputs
     * @return Object $post update post
     */
    public function updateTodo($request, $id);

    /**
     * 
     * Delete todo data from table
     * 
     * @param $id id with inputs
     * @return Object $todo delete todo
     */
    public function deleteTodo($id);
}