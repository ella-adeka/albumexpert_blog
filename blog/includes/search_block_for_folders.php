<?php
    echo ("
        <div data-toggle='search-close'>
            <span class='ti ti-x text-primary'></span>
        </div>
        
        <input type='text' id='js-search-input' placeholder='Type to search blog..' aria-label='search-query'>

        <div class='mt-4 card-meta'>
            <p class='h4 mb-3'>See posts by tags</p>
            <ul class='card-meta-tag list-inline'>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Life</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Lifestyle</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Lighting</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Machine</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Startups</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../tag-single.php'>Work</a>
            </li>
            </ul>
        </div>

        <div class='mt-4 card-meta'>
            <p class='h4 mb-3'>See posts by categories</p>
            <ul class='card-meta-tag list-inline'>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href=../'categories-single.php'>AI</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../categories-single.php'>Earth</a>
            </li>
            <li class='list-inline-item me-1 mb-2'>
                <a class='small' href='../categories-single.php'>Tech</a>
            </li>
            </ul>
        </div>
    ");
?>