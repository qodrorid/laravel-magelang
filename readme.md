#TUGAS
Buatlah aplikasi rental movie dimana ada 2 bagian yaitu customer/client dan admin

##Customer/Client

###Fitur-fitur
 - Pencarian
 - Pagination movie
 - Pinjam movie
 - Login/logout
 - List movie(judul, poster, category bisa lebih dari satu)
 - Detail movie(judul, poster, category, aktor, deskripsi)
 
###Ketentuan
 - Homepage berisi list movie
 - Customer/client harus login sebelum meminjam
 - customer/client tidak bisa memasuki halaman admin
 - tidak bisa melakukan aksi create/update/delete movie
 - tidak boleh meminjam jika customer sedang meminjam movie yang sama

##Admin
###Fitur-fitur
 - create / read / update / delete / pagination movie
 - create / read / update / delete / pagination categories
 - list customer/client
 - Login / logout
 
###Ketentuan
 - 
 
#Table
##movies
* id
* category_id
* title
* year
* description
* poster
* created_at
* updated_at

##categories
* id
* name
* created_at
* updated_at

##users
* id
* name
* email
* password
* role
* created_at
* updated_at

##
movie_user
* id
* user_id
* movie_id
* created_at
* updated_at
