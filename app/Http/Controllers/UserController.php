<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Post;
use App\Traits\ProcessingPagination;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    use ProcessingPagination;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
       $this->resolvePagination($request);

       $users = $this->userRepository->getUsers($this->perPage);

       return view('users.index', ['users' => $users]);
    }

    public function delete(int $userId)
    {
        $this->userRepository->deleteUser($userId, Auth::id());

        return redirect()->back();
    }
}
