<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quotes;

class quotes_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Add some random quotes.
      
          Quotes::create ([  
          'quote' => 'For the dead and the living, we must bear witness',
          'Author' => 'Elie Wiesel',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'Monsters exist, but they are too few in number to be truly dangerous. More dangerous are the common men, the functionaries ready to believe and to act without asking questions',
          'author' => 'Primo Levi',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'Despite the mayhem that followed, Bruno found that he was still holding Shmuel`s hand in his own and nothing in the world would have persuaded him to let go',
          'author' => 'John Boyne, The Boy in the Striped Pajamas',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'If we bear all this suffering and if there are still Jews left, when it is over, then Jews, instead of being doomed, will be held up as an example',
          'author' => 'Anne Frank',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'What exactly was the difference? he wondered to himself. And who decided which people wore the striped pajamas and which people wore the uniforms?',
          'author' => 'John Boyne, The Boy in the Striped Pajamas',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'Thou shalt not be a victim, thou shalt not be a perpetrator, but, above all, thou shalt not be a bystander',
          'author' => 'Yehuda Bauer',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'I swore never to be silent whenever and wherever human beings endure suffering and humiliation. We must take sides. Neutrality helps the oppressor, never the victim. Silence encourages the tormentor, never the tormented',
          'author' => 'Elie Wiesel',
          'Published' => '1',
          ]);
              Quotes::create([
          'quote' => 'For the dead and the living, we must bear witness',
          'author' => 'Elie Wiesel'
          ]);
          Quotes::create([
          'quote' => 'Monsters exist, but they are too few in number to be truly dangerous. More dangerous are the common men, the functionaries ready to believe and to act without asking questions',
          'author' => 'Primo Levi',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'Despite the mayhem that followed, Bruno found that he was still holding Shmuel`s hand in his own and nothing in the world would have persuaded him to let go',
          'author' => 'John Boyne, The Boy in the Striped Pajamas',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'If we bear all this suffering and if there are still Jews left, when it is over, then Jews, instead of being doomed, will be held up as an example',
          'author' => 'Anne Frank',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'What exactly was the difference? he wondered to himself. And who decided which people wore the striped pajamas and which people wore the uniforms?',
          'author' => 'John Boyne, The Boy in the Striped Pajamas',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'Thou shalt not be a victim, thou shalt not be a perpetrator, but, above all, thou shalt not be a bystander',
          'author' => 'Yehuda Bauer',
          'Published' => '1',
          ]);
          Quotes::create([
          'quote' => 'I swore never to be silent whenever and wherever human beings endure suffering and humiliation. We must take sides. Neutrality helps the oppressor, never the victim. Silence encourages the tormentor, never the tormented',
          'author' => 'Elie Wiesel',
          'Published' => '1',
          ]);
 
    }
}
