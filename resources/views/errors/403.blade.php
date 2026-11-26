@extends('errors.layout')

@section('icon', 'ni-shield-off')
@section('code', '403')
@section('title', 'Access Forbidden')
@section('message', $exception->getMessage() ?: 'You do not have the required permissions to view or modify this page.')
