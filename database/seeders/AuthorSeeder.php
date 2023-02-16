<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'J. K. Rowling','biography' => 'Joanne Rowling CH, OBE, FRSL, FRCPE, FRSE, pen names J. K. Rowling and Robert Galbraith, is a British novelist, philanthropist, film producer, television producer, and screenwriter. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history. The books are the basis of a popular film series, over which Rowling had overall approval on the scripts and was a producer on the final films. She also writes crime fiction under the pen name Robert Galbraith.']);
        Author::create(['name' => 'J. R. R. Tolkien','biography' => 'John Ronald Reuel Tolkien CBE FRSL was an English writer, poet, philologist, and university professor who is best known as the author of the classic high fantasy works The Hobbit, The Lord of the Rings, and The Silmarillion.']);
        Author::create(['name' => 'George R. R. Martin','biography' => 'George Raymond Richard Martin is an American novelist and short-story writer in the fantasy, horror, and science fiction genres, screenwriter, and television producer. He is best known for his series of epic fantasy novels, A Song of Ice and Fire, which was later adapted into the HBO series Game of Thrones.']);
        Author::create(['name' => 'Stephen King','biography' => 'Stephen Edwin King is an American author of horror, supernatural fiction, suspense, and fantasy novels. His books have sold more than 350 million copies, and many have been adapted into films, television series, miniseries, and comic books. King has published 54 novels, including seven under the pen name Richard Bachman, and six non-fiction books. He has written nearly 200 short stories, most of which have been collected in book collections. Many of his stories are set in his home state of Maine.']);
        Author::create(['name' => 'J. D. Salinger','biography' => 'Jerome David Salinger was an American writer who is known for his widely-read novel The Catcher in the Rye, as well as his reclusive nature. Salinger was raised in Manhattan and began writing short stories while in secondary school. He served in World War II and then attended New York University, where he studied English literature. He began a career as a writer, publishing short stories in Story magazine and The New Yorker.']);
    }
}
