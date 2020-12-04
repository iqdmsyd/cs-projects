#include "header.h"

void createList (list *L)
{
	(*L).first = NULL;
}

int countElement(list L)
{
	int hasil = 0;

	if(L.first != NULL)
	{
		/*list tidak kosong*/
		elemen *temp; /*membuat pointer pembantu*/

		/*inisialisasi*/
		temp = L.first;

		while(temp != NULL)
		{
			/*proses*/
			hasil = hasil + 1;

			/*iterasi*/
			temp = temp->next;
		}
	}

	return hasil;
}

void addFirst(char temp[], list *L)
{	
	elemen *baru; /*membuat pointer baru*/
	baru = (elemen *) malloc (sizeof(elemen)); /*mengalokasikan memori untuk elemen dengan pointer baru*/
	
	/*memasukan data ke dalam elemen dengan pointer baru*/
	strcpy(baru->info, temp);

	/*kondisi addFirts*/
	if((*L).first == NULL)
	{
		/*jika list kosong*/
		baru->next = NULL;

	}else
	{
		/*jika list tidak kosong*/
		baru->next = (*L).first;
	}

	(*L).first = baru;
	baru = NULL;
}

void addAfter(elemen *prev, char temp[], list *L)
{

	if(prev != NULL){

		elemen *baru; /*membuat pointer baru*/
		baru = (elemen *) malloc (sizeof(elemen)); /*mengalokasikan memori untuk elemen dengan pointer baru*/
		
		/*memasukan data ke dalam elemen dengan pointer baru*/
		strcpy(baru->info, temp);
			
		/*kondisi addAfter*/
		if(prev->next == NULL)
		{
			/*jika prev menunjuk elemen terakhir*/
			baru->next = NULL;

		}else
		{
			/*jika prev menunjuk bukan elemen terakhir*/
			baru->next = prev->next;
		}

		prev->next = baru;
		baru = NULL;
	}
}

void addLast(char temp[], list *L)
{

	if((*L).first == NULL)
	{
		/*jika list adalah list kosong*/
		addFirst(temp, L);
	}else
	{
		/*jika list tidak kosong*/
		/*maka cari elemen terakhir*/
		elemen *prev = (*L).first;

		/*proses mencari elemen terakhir*/
		while(prev->next != NULL)
		{
			/*iterasi*/
			prev = prev->next;
		}

		/*jika sudah ketemu, panggil addAfter*/
		addAfter(prev, temp, L);
	}
}

void printElementInTree(list L, int space)
{
	if(L.first != NULL)
	{
		/*jika list tidak kosong*/
		/*inisisalisasi*/
		int i;
		elemen *temp = L.first;

		while(temp != NULL)
		{
			/*proses*/
			for(i=0; i<space; i++) printf(" ");
			printf(" %s\n", temp->info);

			/*iterasi*/
			temp = temp->next;
		}

	}
}

void printElement(list L)
{
	if(L.first != NULL)
	{
		/*jika list tidak kosong*/
		/*inisisalisasi*/
		int i;
		elemen *temp = L.first;

		while(temp != NULL)
		{
			/*proses*/
			printf("- %s\n", temp->info);

			/*iterasi*/
			temp = temp->next;
		}

	}
} 

void makeTree(data temp, tree *T, list detail)
{
	simpul *node;
	node = (simpul *) malloc (sizeof (simpul));
	// node->container.root = temp.root;
	strcpy(node->container.root, temp.leaf);
	node->detail = detail;
	node->container.length = 0;
	node->container.lvl = 0;
	node->sibling = NULL;
	node->child = NULL;
	(*T).root = node;
}

void addChild(data temp, simpul *root, list detail)
{
	if(root != NULL)
	{
		simpul *node;
		node = (simpul *) malloc (sizeof (simpul));
		strcpy(node->container.root, temp.leaf);
		node->detail = detail;
		node->container.length = 0;
		node->child = NULL;

		/* jika root belum punya anak */
		if(root->child == NULL)
		{
			node->sibling = NULL;
			root->child = node;
		}
		else
		{	
			/* jika root sudah punya satu anak */
			if(root->child->sibling == NULL)
			{
				node->sibling = root->child;
				root->child->sibling = node;
			}
			else
			{
				/* jika root sudah punya > satu anak, cari anak terakhir */
				simpul *last = root->child;

				while(last->sibling != root->child)
				{
					last = last->sibling;
				}

				node->sibling = root->child;
				last->sibling = node;
			}
		}

	}
}

simpul* findSimpul(data temp, simpul *root)
{
	simpul *hasil = NULL;
	if(root != NULL)
	{
		if(strcmp(root->container.root, temp.root) == 0) hasil = root;
		else
		{
			simpul *node = root->child;
			if(node != NULL)
			{
				/* jika memiliki satu anak */
				if(node->sibling == NULL)
				{
					/* jika memiliki satu anak */
					if(strcmp(node->container.root, temp.root) == 0)
					{
						hasil = node;	
					} 
					else
					{
						hasil = findSimpul(temp, node);	
					}
				}
				else
				{
					/* jika memiliki banyak anak */	
					int ketemu = 0;
					while((node->sibling != root->child) && (ketemu == 0))
					{
						if(strcmp(node->container.root, temp.root) == 0)
						{
							hasil = node;
							ketemu = 1;
						}
						else
						{
							if(hasil == NULL)
							{
								hasil = findSimpul(temp, node);
								node = node->sibling;
							}
							else
								ketemu = 1;
						}
					}

					/* memproses simpul anak terakhir karena belum terproses dalam pengulangan */
					if(ketemu == 0)
					{
						if(strcmp(node->container.root, temp.root) == 0)
						{
							hasil = node;	
						} 
						else
						{
							if(hasil == NULL)
							{
								hasil = findSimpul(temp, node);
								node = node->sibling;
							}
							else
								ketemu = 1;
						} 
					}
				}
			}
		}
	}
	return hasil;
}

void printTreePreOrder(simpul *root, tree T, int space)
{
	if(root != NULL)
	{
		int i, max;

		simpul *upper = findBapak(root->container.root, T.root);
		max = getSpace(upper);

		if(root != T.root)
			space += max + 1;

		for(i=0; i<space; i++) printf(" ");
		printf("|%s %d\n", root->container.root, root->container.lvl);

		printElementInTree(root->detail, space);
		printf("\n");


		simpul *node = root->child;

		if(node != NULL)
		{
			if(node->sibling == NULL)
			{
				printTreePreOrder(node, T, space); /* jika memiliki satu anak */
			} 
			else
			{
				/* jika memiliki banyak anak */
				/* mencetak simpul anak */
				while(node->sibling != root->child)
				{
					printTreePreOrder(node, T, space);
					node = node->sibling;
				}

				/* memproses simpul anak terakhir karena belum terproses dalam pengulangan */
				printTreePreOrder(node, T, space);
			}
		}
	}
}

void getLength(simpul *root, elemen *elmt, int lvl)
{
	if(root != NULL)
	{
		int i, j, max;

		root->container.lvl = lvl;
		lvl++;
		maxLvl = lvl;
		max = strlen(root->container.root);

		elmt = root->detail.first;

		if(elmt != NULL)
		{
			while(elmt != NULL)
			{
				if(strlen(elmt->info) > max)
					max = strlen(elmt->info);

				elmt = elmt->next;
			}
		}

		root->container.length = max;
		// printf("%d\n", max);
		// printf("wkwkwk\n");

		simpul *node = root->child;

		if(node != NULL)
		{
			if(node->sibling == NULL) getLength(node, NULL, lvl); /* jika memiliki satu anak */
			else
			{
				/* jika memiliki banyak anak */
				 // mencetak simpul anak 
				while(node->sibling != root->child)
				{
					getLength(node, NULL, lvl);
					node = node->sibling;
				}

				/* memproses simpul anak terakhir karena belum terproses dalam pengulangan */
				getLength(node, NULL, lvl);
			}
		}		
	}
}

simpul *findBapak(char nama[], simpul *root)
{
	simpul *hasil = NULL;

	if(root != NULL)
	{
		if(strcmp(root->container.root, nama) == 0)
			hasil = root;
		else
		{
			simpul *node = root->child;

			if(node != NULL)
			{
				if(node->sibling == NULL)
				{
					if(strcmp(node->container.root, nama) == 0)
						hasil = root;
					else
						hasil = findBapak(nama, node);
				}
				else
				{
					int found = 0;

					while((node->sibling != root->child) && (found == 0))
					{
						if(strcmp(node->container.root, nama) == 0)
						{
							hasil = root;
							found = 1;
						}
						else
						{
							if(hasil == NULL)
							{
								hasil = findBapak(nama, node);
								node = node->sibling;
							}
							else
								found = 1;
						}
					}

					if(found == 0)
					{
						if(strcmp(node->container.root, nama) == 0)
							hasil = root;
						else
						{
							if(hasil == NULL)
							{
								hasil = findBapak(nama, node);
								node = node->sibling;
							}
							else
								found = 1;
						}
					}
				}
			}
		}
	}

	return hasil;
}

int getSpace(simpul *root)
{
	int max = 0;

	if(root != NULL)
	{
		if(root->sibling == NULL)
			return root->container.length;
		else
		{
			simpul *node = root->sibling;
			max = root->container.length;

			while(node->sibling != root)
			{
				if(node->container.length > max)
					max = node->container.length;

				node = node->sibling;
			}

			if(node->container.length > max)
				max = node->container.length;
		}
	}

	return max;
}

void getMax()
