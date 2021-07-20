<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserInnRequest;
use App\Models\QueryInterface;
use App\Services\InnInterface;
use Illuminate\Http\RedirectResponse;

class QueryController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function check(
        CheckUserInnRequest $request,
        QueryInterface $query,
        InnInterface $inn
    ): RedirectResponse {

        $value = $request->input('inn');

        $currentQuery = $query->getQuery($value);

        if ($currentQuery->isNew() || $currentQuery->isExpired()) {

            $checkInn = $inn->check($value);

            $currentQuery->saveMessage($checkInn->message);

            if ($checkInn->status === 'success') {

                $currentQuery->setCorrect();

                return $this->successRedirect($checkInn->message);
            }

            return $this->errorRedirect($checkInn->message);
        }

        if ($currentQuery->isCorrect()) {
            return $this->successRedirect($currentQuery->message);
        }

        return $this->errorRedirect($currentQuery->message);
    }

    private function successRedirect(string $message): RedirectResponse
    {
        return redirect()
            ->route('home')
            ->with('status', 'success')
            ->with('message', $message);
    }

    private function errorRedirect(string $message): RedirectResponse
    {
        return redirect()
            ->route('home')
            ->with('status', 'error')
            ->with('message', $message);
    }
}
