@extends('layouts.app')
@section('content')
    <style>
        #app {

        }
    </style>

    @verbatim
        <div id="app">
            <table class="table">
            <thead>
                <tr>
                    <th>1</th>                
                    <th>2</th>                
                    <th>3</th>                
                </tr>
            </thead>
            <tbody>
                <tr v-for="data in datas">
                    <th>{{ data }}</th>                
                    <th>{{ data }}</th>                
                    <th>{{ data }}</th>                
                </tr>
            </tbody>
            </table>
        </div>
    @endverbatim

    <script src="https://unpkg.com/vue"></script>    
    <script>
        var app = new Vue({
        el: '#app',
        data: {
            datas: [1,2,3,4,5]
        }
        })
    </script>

@stop