@extends('layouts.app')
@section('webtitle')
    Dashboard
@endsection

@section('content')
    <section class="h-screen bg-white">
        <div class="flex flex-col w-full mx-auto max-w-auto">
            <div class="mx-auto max-w-9xl">
                <div class="mx-auto max-w-full">
                    <div class="flex flex-row">
                        <div class="flex flex-col w-1/4 ml-14 mr-14">
                            <div class="w-full relative flex flex-wrap items-start space-x-3 p-6 border border-[#939393] rounded-lg shadow-lg">
                                <div class="justify-center mx-auto max-y-md max-w-lg flex items-center">
                                    <div class="justify-center mx-auto max-y-md max-w-lg w-full">
                                        <div class=" container">
                                            <img src='/image/profileBG.png' class="w-full h-[7rem] object-cover " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col w-1/3">
                            <div class="w-full relative flex flex-wrap items-start p-6 border border-[#939393] rounded-lg shadow-lg">
                                <div class="justify-center mx-auto flex w-full items-center">
                                    <div>Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center 
                                        Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center Hello Center Center Center Center Center Center 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-1/4 ml-14 mr-14">
                            <div class="w-full relative flex flex-wrap items-start space-x-3 py-[1.8rem] px-2 border border-[#939393] rounded-lg shadow-lg">
                                <div class="justify-center mx-auto max-y-md max-w-lg flex items-center">
                                    <div>
                                       RIGHT asdasdasd RIGHT asdasdasd RIGHT asdasdasd RIGHT asdasdasd RIGHT asdasdasd RIGHT    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection