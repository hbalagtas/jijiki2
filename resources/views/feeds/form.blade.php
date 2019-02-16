<div class="form-group">
    {{Form::label('name', 'Feed Name')}}
    {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Road Bikes'])}}
</div>
<div class="form-group">
    {{Form::label('feed', 'Feed Link')}}
    {{Form::text('feed', null, ['class' => 'form-control', 'placeholder' => 'http://kijiji.rss'])}}
</div>
 <div class="form-group">
    {{Form::label('blocklist', 'Blocked Keywords:')}}
    {{Form::text('blocklist', null, ['class' => 'form-control', 'placeholder' => '[spam|spam]'])}}
</div>