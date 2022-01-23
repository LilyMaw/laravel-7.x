<?php
namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * This is Todo controller.
 * This handles Todo CRUD processing.
 */
class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    /**
     * Display List
     * 
     * @return View todo list
     */

    }
    public function index() 
    {
        $todos = DB::table('todo')->get();

        return view('todo.todoList', ['todoList' => $todos]);
    }

    /**
     * To show create post view
     * 
     * @return View create page
     */
    public function createTodo()
    {
        return view('todo.create');
    }

    /**
     * To save new Todo
     * @param Request $request name, instruction
     * @return View todo list
     */
    public function storeTodo(Request $request)
    {
        $name = $request->name;
        $instruction = $request->instruction;
    
        DB::transaction(function () use ($name, $instruction) {
          DB::insert(
            'insert into todo (name, instruction) values (?, ?)',
            [$name, $instruction]
          );
        });
        return redirect()->route('todo-list');
    }

    /**
     * To view detail
     * @param id $request id
     * @return View detail page
     */
    public function showTodo($id) 
    {
        $todos = DB::table('todo')->where('id', $id)->get();
        return view('todo.detail',['todoList' => $todos]);
    }

    /**
     * To edit todo
     * @param $request id
     * @return View edit page
     */
    public function editTodo($id)
    {
        $todos = DB::table('todo')->where('id', $id)->get();
        return view('todo.edit',['todoList' => $todos]);
    }

    /**
     * To update Todo
     * @param Request $request name, instruction
     * @param id $request id
     * @return View todo list
     */
    public function updateTodo(Request $request, $id)
    {
        $name = $request->name;
        $instruction = $request->instruction;
        DB::table('todo')->where('id', $id)->update([
            'name' => $name,
            'instruction' => $instruction,
        ]);
        return redirect()->route('todo-list');
    }

    /**
     * To delete Todo
     * @param id $request id
     * @return View todo list
     */
    public function destroyTodo($id)
    {
        DB::table('todo')->where('id', $id)->delete();
        return redirect()->route('todo-list');
    }
}
?>