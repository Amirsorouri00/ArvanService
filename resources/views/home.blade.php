@extends('layouts.app')

@section('content')
    <router-link to="/home">Go to home</router-link>
    <router-link to="/blog">Go to blog</router-link>
    <router-link to="/foo">Go to Foo</router-link>
    <router-link to="/bar">Go to Bar</router-link>

   

    <router-view></router-view>

@endsection