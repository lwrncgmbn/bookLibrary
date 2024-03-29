<?php require 'src/views/partial/head.php' ?>

<div class="bg-[#00000090] w-full z-30 fixed flex justify-center items-center min-h-screen px-2">
    <div class="bg-white shadow-md rounded-md p-4 max-w-xl w-full">
        <h1 class="text-xl font-bold ">Add book:</h1>
        <hr class="my-2">
        <form action="/added-book" method="POST" class="flex flex-col gap-4 my-4" enctype="multipart/form-data">
            <div class="">
                <label for="bookName">Book name:</label>
                <input type="text" name="bookName" id="bookName" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none" placeholder="Example: The Book" required>
                <?php if (isset($errors['book'])) : ?>
                    <p class="text-xs text-danger mt-1"><?= $errors['book'] ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="authorName">Author name:</label>
                <input type="text" name="authorName" id="authorName" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none" placeholder="Example: Juan Dela Cruz" required>
            </div>
            <div>
                <label for="category">Book Category:</label>
                <select name="category" id="category" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none">
                    <option value="None">Select Category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errors['category'])) : ?>
                    <p class="text-xs text-danger mt-1"><?= $errors['category'] ?></p>
                <?php endif; ?>
            </div>
            <!-- <div>
                <label for="status">Status:</label>
                <select name="status" id="status" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none">
                    <option value="Read">Select Status</option>
                    <option value="Read">Unread</option>
                    <option value="Unread">Read</option>
                </select>
            </div> -->
            <div class="flex flex-col">
                <p>Upload a file:</p>
                <input type="file" name="fileUpload" id="fileUpload" hidden>
                <label for="fileUpload" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none cursor-pointer" id="fileName">
                    Please upload a file.
                </label>
            </div>
            <div class="flex justify-between w-full gap-2">
                <a href="/myBooks" class="flex justify-center w-full">
                    <p class="text-white bg-[#DC3545] py-1 font-bold rounded-md shadow-md tracking-widest w-full text-center hover:brightness-110 duration-300">CANCEL</p>
                </a>
                <div class="flex justify-center w-full"><button type="submit" class="text-white bg-[#28A745] py-1 font-bold rounded-md shadow-md tracking-widest w-full hover:brightness-110 duration-300">DONE</button></div>
            </div>
            <?php if (isset($errors['file'])) : ?>
                <p class="text-xs text-danger text-center"><?= $errors['file'] ?></p>
            <?php endif; ?>
        </form>

    </div>
</div>


<?php require 'src/views/partial/nav.php' ?>
<?php require 'src/views/partial/sidebar.php' ?>


<main class="py-4 px-2 md:pl-56 md:pr-8 max-w-7xl m-auto pt-24">
    <!-- SEARCH -->
    <div class="flex flex-col gap-4">
        <!-- SEARCH TITLE, AUTHOR, KEYWORDS -->
        <div class="flex items-center gap-2 bg-body border p-2 border-outline rounded-md w-full">
            <i class="fa-solid fa-magnifying-glass text-outline"></i>
            <input type="text" id="search" class="w-full bg-transparent outline-none " placeholder='Search'>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <select name="" id="categories" class="w-full p-2 rounded-md bg-body border border-outline text-outline outline-none">
                    <option value="All">Select Categories</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="w-full">
                <select name="" id="status" class="w-full p-2 rounded-md bg-body border border-outline text-outline outline-none">
                    <option value="All">Select Status</option>
                    <option value="Read">Read</option>
                    <option value="Unread">Unread</option>
                </select>
            </div> -->
        </div>
    </div>
    <!-- MY BOOKS -->
    <div class="w-full justify-between my-6 flex items-center">
        <h1 class="text-xl font-bold ">My Books</h1>
        <a href="" class="text-white bg-[#2563EB] py-1 px-4 rounded-md shadow-md">Add Book</a>
    </div>
    <table class=" w-full rounded-md overflow-clip shadow-md text-center">
        <!-- HEAD -->
        <thead class="bg-[#F2F1F1]  py-3 text-center">
            <tr>
                <th class="py-3 px-2">Title</th>
                <th>Author</th>
                <th>Category</th>
                <!-- <th>Status</th> -->
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($books as $book) : ?>
                <tr class="border-b">
                    <td class="py-3 px-2 title"><?= $book['title'] ?></td>
                    <td class="author"><?= $book['author'] ?></td>
                    <td class="category"><?= $book['category'] ?></td>
                    <!-- <td class="underline">
                        <?php if ($book['status'] == 0) : ?>
                            <a href="" class="status">Unread</a>
                        <?php else : ?>
                            <a href="" class="status">Read</a>
                        <?php endif; ?>
                    </td> -->
                    <td class="py-3">
                        <a href="" class="bg-[#28A745] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-eye "></i></a>
                        <a href="" class="bg-[#2563EB] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-pen-to-square "></i></a>
                        <a href="" class="bg-[#DC3545] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-trash "></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script>
    // addEventListener('input', () => {
    //     // INPUT
    //     const search = document.getElementById('search').value.toLowerCase();
    //     const categories = document.getElementById('categories').value;
    //     const status = document.getElementById('status').value;

    //     // DATA
    //     const titles = document.querySelectorAll('.title');
    //     const authors = document.querySelectorAll('.author');
    //     const categoriesElements = document.querySelectorAll('.category');
    //     const statusElements = document.querySelectorAll('.status');

    //     titles.forEach((title, index) => {
    //         const row = title.closest('tr');
    //         const bookTitle = title.textContent.toLowerCase();
    //         const bookAuthor = authors[index].textContent;
    //         const bookCategory = categoriesElements[index].textContent;
    //         const bookStatus = statusElements[index].textContent;

    //         const titleMatch = bookTitle.includes(search);
    //         const authorMatch = bookAuthor.toLowerCase().includes(search);
    //         const categoryMatch = categories === 'All' || bookCategory === categories;
    //         const statusMatch = status === 'All' || bookStatus === status;
    //         // Display row if any condition is true
    //         if ((titleMatch || authorMatch) && categoryMatch && statusMatch) {
    //             row.style.display = '';
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function() {
        const fileUpload = document.getElementById('fileUpload');
        const fileName = document.getElementById('fileName');

        fileUpload.addEventListener('change', function() {
            const nameOfFile = fileUpload.files[0]?.name;
            fileName.innerHTML = nameOfFile;
        });
    });
</script>