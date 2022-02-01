<?php

namespace App\Dao;

use App\Contracts\Dao\TodoDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * Service class for post.
 */
class TodoDao implements TodoDaoInterface
{
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct()
    {
    }

    /**
     * get todo data from table
     * 
     * @return array $todoList Todo list
     */
    public function getTodoList()
    {
        return DB::table('todo')->paginate(5);
    }

    /**
     * Store todo data to table
     *
     * @param request $name name with inputs
     * @return Object $todo saved todo
     */
    public function saveTodo($name, $instruction)
    {
        DB::transaction(function () use ($name, $instruction) {
            DB::insert(
                'insert into todo (name, instruction) values (?, ?)',
                [$name, $instruction]
            );
        });
    }

    /**
     * Update todo data to table
     *
     * @param request $request request with inputs
     * @param object int $id
     * @return Object $todo update todo
     */
    public function updateTodo($request, $id)
    {
        $name = $request->name;
        $instruction = $request->instruction;
        DB::table('todo')->where('id', $id)->update([
            'name' => $name,
            'instruction' => $instruction,
        ]);
    }
    
    /**
     * 
     * Delete todo data from table
     * 
     * @param object int $id
     * @return Object $todo delete todo
     */
    public function deleteTodo($id)
    {
        DB::table('todo')->where('id', $id)->delete();
    }
}