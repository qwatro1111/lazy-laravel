@extends('layouts.app')<!-- views/layouts/app.blade.php -->

@section('content')

<!-- Bootstrap шаблон... -->

<div>
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}

	<!-- Имя задачи -->
	<div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Name</label>

	    <div class="col-sm-6">
		<input type="text" name="name" id="task-name" class="form-control">
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Description</label>

	    <div class="col-sm-6">
		<input type="text" name="description" id="task-name" class="form-control">
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Price</label>

	    <div class="col-sm-6">
		<input type="text" name="price" id="task-name" class="form-control">
	    </div>
	</div>

	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-plus"></i> Добавить задачу
		</button>
	    </div>
	</div>
    </form>
</div>

<!-- TODO: Текущие задачи -->
@if (count($tasks) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Products
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

	    <!-- Заголовок таблицы -->
	    <thead>
		<tr>
		    <th>Name</th>
		    <th>Price</th>
		</tr>
            
            <th>&nbsp;</th>
	    </thead>

	    <!-- Тело таблицы -->
	    <tbody>
		@foreach ($tasks as $task)
		<tr title="{{ $task->description }}">
		    <!-- Имя задачи -->
		    <td class="table-text">
			<div>{{ $task->name }}</div>
		    </td>
		    <td class="table-text">
			<div>{{ $task->price }}</div>
		    </td>

		    <td>
			<!-- TODO: Кнопка Удалить -->
			<form action="{{ url('task/'.$task->id) }}" method="POST">
			    {{ csrf_field() }}
			    {{ method_field('DELETE') }}

			    <button type="submit" class="btn btn-danger">
				<i class="fa fa-trash"></i> Удалить
			    </button>
			</form>
		    </td>
		</tr>
		@endforeach
	    </tbody>
        </table>
    </div>
</div>
@endif
@endsection