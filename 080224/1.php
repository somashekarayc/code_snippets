//by som 
$themes = Theme::where('status', 1)->orderBy('id', 'asc')->limit(12)->get();

// echo '<pre>';
// print_r($themes);
// die;