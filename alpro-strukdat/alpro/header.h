#include <stdio.h> /* standar input output library */
#include <stdlib.h> /* standar library */
#include <string.h> /* string libray */
#include <time.h> /* library untuk prosedur wait */
#include <windows.h> /* library untuk pewarnaan */

/*
* Saya Iqdam Musayyad R tidak melakukan kecurangan yang dispesifikasikan
* pada tugas masa depan Alpro 2 pada saat mengerjakan Tugas Masa Depan Alpro 2.
* Jika saya melakukan kecurangan maka Allah/Tuhan adalah saksi saya,
* dan saya bersedia menerima hukumanNya. Aamiin.
*/

/* tipedata untuk data kota */
typedef struct
{
	int x; /* koordinat x kota */
	int y; /* koordinat y kota */
	char name[32]; /* nama kota */
}cType;

/* tipedata untuk data jalur */
typedef struct
{
	int number; /* no jalur */
	char firstCity[32]; /* kota pertama (awal) */
	char secondCity[32]; /* kota kedua (akhir) */
}pType;



//===: VARIABEL GLOBAL
/**
* cityCounter dan pathCounter sebagai counter data kota dan data jalur
* EOA sebagai penanda end of animation
* OOM sebagai penanda jika ada jalur yang keluar dari Map
*/
int cityCounter, pathCounter;
int EOA;



//===: PROSEDUR MEMBACA DAN MENULIS FILE
/**
* readFile membaca file city dan path
* writeCity menulis pada file city
* writePath menulis pada file path
* parameter yang dimasukan adalah data kota dan jalur
*/
void readFile	(cType city[], pType path[]);
void writeCity	(cType city[]);
void writePath	(pType path[]);



//===: PROSEDUR DAN FUNGSI TAMBAHAN
/**
* findX mencari lalu melempar nilai koordinat x
* findY mencari lalu melempar nilai koordinat y
* isInc mengecek apakah jalur berjalan dari kiri ke kanan dan atas ke bawah atau sebaliknya
* noRedundant mengecek apakah kota yang dimasukan ke jalur ada pada file tkota atau tidak
* wait melalkukan pause pada program sebelum mengeksekusi baris program selanjutnya
* setColor merubah warna pada cmd (windows)
*/
int findX(cType city[], pType path[], int n);
int findY(cType city[], pType path[], int n);
// int isInc(int a, int b);
int noRedundant(cType city[], pType path[]);
void wait(float x);
void setColor(int ForgC, int BackC);



//===: PROSEDUR OUTPUT
/**
* popSubMenu menampilkan daftar sub menu
* popMap menampilkan peta
* popCity menampilkan tabel daftar kota
* popPath menampilkan tebel daftar jalur
* popBorder menampilkan border peta
*/
void popSubMenu	();
void popMap		(cType city[], char map[][512], int length, int wide);
void popCity	(cType city[]);
void popPath	(cType city[], pType path[], int length, int wide);
void popBorder	(int wide);



//===: PROSEDUR MENU0
/**
* setSize merubah ukuran peta
*/
void setSize(int *length, int *wide);



// ===: PROSEDUR MENU1
/**
* insertCity menambahkan kota ke program
* deleteCity menghapus kota dari program
* sortCity mengurutkan kota sesuai penampilannya di peta
*/
void insertCity	(cType city[]);
void deleteCity	(cType city[], pType path[]);
void sortCity	(cType city[]);



//===: PROSEDUR MENU2
/**
* insertPath menambahkan jalur ke program
* sortPath mengurutkan jalur
* deletePath menghapus jalur dari program
*/
void insertPath	(cType city[], pType path[]);
void sortPath	(cType city[], pType path[]);
void deletePath	(pType path[]);



//===: PROSEDUR MENU3
/**
* fillMap mengisi peta dengan kota
* solveAnimation menampilkan animasi
* endOfAnimation menampilkan posisi akhir animasi
*/
void fillMap 		(cType city[], char map[][512]);
void solveAnimation	(cType city[], pType path[], char map[][512], int length, int wide);
void endOfAnimation	(pType path[], char map[][512], int length, int wide, int x, int y, int n);
