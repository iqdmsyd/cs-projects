#include "header.h"

int main(){

	cType city[512]; /* menyimpan data kota */
	pType path[512]; /* menyimpan data jalur */
	char map[512][512]; /* menyimpand data peta */
	int menu, subMenu; /* menyimpan input menu dan submenu */
	int length = 20, wide = 50; /* set default panjang dan lebar peta */
	EOA = 0; /* end of animation diset false */
	OOM = 0;
	system("cls"); /* membersihkan layar */
	do{

		readFile(city, path); /* dilakukan pembacaan file */
		if(EOA == 0){
			popMap(city, map, length, wide); /* peta ditampilkan ketika eoa false */
		}
		printf("Menu :\n");
		printf("  0. Panjang dan Lebar Peta\n");
		printf("  1. Kelola kota\n");
		printf("  2. Kelola jalur\n");
		printf("  3. Animasi Solve\n");
		printf("  4. Keluar\n");
		printf("Masukkan Menu : ");
		scanf("%d", &menu); /* input pilihan menu */

		switch(menu){

			case 0:
				EOA = 0;
				setSize(&length, &wide); /* memanggil prosedur setSize */
			break;

			case 1:
				EOA = 0;
				do{	
					if(cityCounter != 0){
						popCity(city); /* menampilkan tabel kota jika data ada */
					}else{
						system("cls");
						printf("Daftar kota kosong, silahkan tambah kota terlebih dahulu.\n");
					}
					popSubMenu(); /* menampilkan dafat sub menu */ 
					scanf("%d", &subMenu);
					switch(subMenu){
						case 1:
							insertCity(city); /* memanggil prosedur menambahkan kota */
						break;
						case 2:
							deleteCity(city, path); /* memanggil prosedur menghapus kota */
						break;
						case 3:
							system("cls");
						break;
					}

				}while(subMenu != 3);
			break;

			case 2:
				EOA = 0;
				do{
					if(pathCounter != 0){
						popPath(city, path, length, wide); /* menampilkan tabel jalur jika data ada */
					}else{
						system("cls");
						printf("Daftar jalur kosong, silahkan tambah jalur terlebih dahulu.\n");
					}
					popSubMenu(); /* menampilkan daftar sub menu */
					scanf("%d", &subMenu);
					switch(subMenu){
						case 1:
							insertPath(city, path); /* memanggil prosedur menambahkan jalur */
						break;
						case 2:
							deletePath(path); /* memanggil prosedur menghapus jalur */
						break;
						case 3:
							system("cls");
						break;
					}
				}while(subMenu != 3);
			break;

			case 3:
				system("cls");
				fillMap(city, map); /* mengisi peta */
				if(pathCounter != 0 && OOM == 0){
					solveAnimation(city, path, map, length, wide);  /* menjalankan animasi jika jalur ada */ 
				}else if(pathCounter == 0){
					printf("Tidak ada jalur yang tersedia.\n");
					wait(2.0);
					system("cls");
				}else if(OOM == 1){
					printf("Ada jalur yang melewati ukuran peta.\n");
					printf("Ubah ukuran peta terlebih dahulu.\n");
					wait(2.0);
					system("cls");
				}
			break;

			case 4:
			// setColor(15, 0);
			system("cls");
			system("exit");
			break;
		}

	}while(menu != 4); /* program akan terus diulang sampai user menginputkan menu 4 */

	return 0;
}	