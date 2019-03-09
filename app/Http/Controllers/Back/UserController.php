<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 2/28/2019
 * Time: 11:19 AM
 */

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController Extends Controller
{

    protected $repository;

    /**
     * Create a new controller instance.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);
       return view('back.users.index', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('back.users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->repository->store($inputs);

        return redirect(route('users.index'));
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        $user = User::where('id', $userId)->first();
        return view('back.users.edit', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $userId)
    {
        $inputs = $request->all();
        $user = $this->repository->update($inputs, $userId);

        return view('back.users.edit', compact('user'));
    }

    /**
     * @param $userId
     * @return string
     */
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->first();
        $user->delete();

        $users = User::paginate(25);

        return view('back.users.index', ['users' => $users]);
    }

}