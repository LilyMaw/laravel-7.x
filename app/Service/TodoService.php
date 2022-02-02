<?php

namespace App\Service;

use App\Contracts\Dao\TodoDaoInterface;
use App\Contracts\Service\TodoServiceInterface;

/**
 * Service class for todo.
 */
class TodoService implements TodoServiceInterface
{
    private $todoDao;
    /**
     * Class Constructor
     * @param TodoDaoInterface
     * @return
     */
    public function __construct(TodoDaoInterface $todoDao)
    {
        $this->todoDao = $todoDao;
    }
    
    /**
     * get todo data from table
     * 
     * @return array $todoList Todo list
     */
    public function getTodoList()
    {
       return $this->todoDao->getTodoList();
    }

    /**
     * Store todo data to table
     *
     * @param request $name name with inputs
     * @return Object $post saved todo
     */
    public function saveTodo($name, $instruction)
    {
        return $this->todoDao->saveTodo($name, $instruction);
    }

    /**
     * Update post data to table
     *
     * @param request $request request with inputs
     * @param $id id with inputs
     * @return Object $post update post
     */
    public function updateTodo($request, $id)
    {
        return $this->todoDao->updateTodo($request, $id);
    }

    /**
     * 
     * Delete todo data from table
     * 
     * @param $id id with inputs
     * @return Object $todo delete todo
     */
    public function deleteTodo($id)
    {
        return $this->todoDao->deleteTodo($id);
    }
}