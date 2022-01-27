@extends('layouts.auth-layout')
@section('admin-layout')


<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <div class="login-wrapper password-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
          <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <span class="tx-normal">[</span>Admin <span class="tx-info">Login</span>
            <span class="tx-normal">]</span>
        </div>
          <div class="tx-center mg-b-30">The Admin Template For Perfectionist</div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Confirm</button>
            </div>
        </form>
@endsection

