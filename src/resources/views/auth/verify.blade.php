@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="message">
    <div>登録していただいたメールアドレスに確認メールを送信しました。</div>
    <div>メール認証を完了してください。</div>
</div>
        <div class="form__button">
            <a class="form__button-submit" href="http://localhost:8025">認証はこちらから</a>

        </div>
        <form action="{{ route('verification.resend') }}" method="POST">
            @csrf
            <!-- <button type="submit">認証メールを再送信する</button> -->
            <!-- href="#" onclick="this.closest('form').submit();" class="form__link">認証メールを再送信する</a> -->
            <a href="#" onclick="this.closest('form').submit();" class="form__link" role="button">認証メールを再送信する</a>

        </form>
@endsection