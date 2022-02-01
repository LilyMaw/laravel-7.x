<?php

namespace App\Http\Controllers\Todo;

use App\Contracts\Service\TodoServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * This is Todo controller.
 * This handles Todo CRUD processing.
 */
class TodoController extends Controller
{
    private $todoService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoServiceInterface $todoServiceInterface)
    {
        $this->todoService = $todoServiceInterface;
    }

    /**
     * Display List
     * 
     * @return View todo list
     */
    public function index()
    {
        $todos = $this->todoService->getTodoList();

        return view(
            'todo.todoList',
            ['todoList' => $todos]
        )->with('i', (request()->input('page', 1) - 1) * 5);
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
     * To confirm new todo
     * @param TodoRequest $request name, instruction
     * @return View todo list
     */
    public function confirmTodo(TodoRequest $request)
    {
        return view('todo.create-confirm')
            ->with('name', $request->name)
            ->with('instruction', $request->instruction);
    }

    /**
     * To store new todo
     * @param Request $request name, instruction
     * @return View todo list
     */
    public function storeTodo(Request $request)
    {
        $this->todoService->saveTodo($request->name, $request->instruction);
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
        return view('todo.detail', ['todoList' => $todos]);
    }

    /**
     * To edit todo
     * @param id $request id
     * @return View edit page
     */
    public function editTodo($id)
    {
        $todos = DB::table('todo')->where('id', $id)->get();
        return view('todo.edit', ['todoList' => $todos]);
    }

    /**
     * To confirm the edited Todo
     * @param TodoRequest $request name, instruction
     * @param id $request id
     * @return View todo list
     */
    public function editConfirmTodo(TodoRequest $request, $id)
    {
        $todos = DB::table('todo')->where('id', $id)->get();
        return view('todo.edit-confirm', ['todoList' => $todos])
            ->with('name', $request->name)
            ->with('instruction', $request->instruction);
    }
    /**
     * To update Todo
     * @param Request $request name, instruction
     * @param id $request id
     * @return View todo list
     */
    public function updateTodo(Request $request, $id)
    {
        $this->todoService->updateTodo($request, $id);
        return redirect()->route('todo-list');
    }

    /**
     * To delete Todo
     * @param id $request id
     * @return View todo list
     */
    public function destroyTodo($id)
    {
        $this->todoService->deleteTodo($id);
        return redirect()->route('todo-list');
    }
}
