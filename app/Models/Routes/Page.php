<?php

namespace App\Models\Routes;

use App\Models\Page\Page as PageModel;

class Page extends PageModel
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
