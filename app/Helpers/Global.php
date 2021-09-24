<?php

function sekolah()
{
  return \App\Models\Sekolah::firstOrFail();
}

function background()
{
  $background = collect([
                        '1' => 'primary',
                        '2' => 'success',
                        '3' => 'warning',
                        '4' => 'danger',
                        '5' => 'info',
                        '6' => 'fuchsia'
                      ]);
  return $background;
}