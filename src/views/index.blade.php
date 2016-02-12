@extends('clumsy::templates.index')

@section('master')
    <div>

  <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <?php
            $active = 'active';
        ?>
        @foreach($sections as $sectionSlug => $section)
            <li role="presentation" class="{{ $active ?: '' }}">
                <a href="{{ '#'.$sectionSlug }}" aria-controls="home" role="tab" data-toggle="tab">{{ $section->getName() }}</a>
            </li>
            <?php
                $active = null;
            ?>
        @endforeach
    </ul>

  <!-- Tab panes -->
    <div class="tab-content">
        <?php
            $active = 'active';
        ?>
        @foreach($sections as $sectionSlug => $section)
            <div role="tabpanel" class="tab-pane {{ $active ?: '' }}" id="{{ $sectionSlug }}">
                {{ FormBuilder::loadIndex($sectionSlug) }}
            </div>
            <?php
                $active = null;
            ?>
        @endforeach
    </div>

</div>
@stop