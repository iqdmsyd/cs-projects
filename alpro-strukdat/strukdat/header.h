#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <malloc.h>

typedef struct
{
	char root[128];
	char leaf[128];
	int length;
	int lvl;
}data;

/* mendeklarasikan pointer yang menuju ke tipe data elmt bernama alamatelmt */
typedef struct elmt *alamatelmt;
typedef struct elmt
{
	char info[256]; /* membuat kontainer dari tipe data nilaiMatkul */
	alamatelmt next; /* membuat pointer baru bernama next */
}elemen;

typedef struct
{
	elemen *first; /* membuat pointer first untuk elemen */
}list;

typedef struct smp *alamatsimpul;
typedef struct smp
{
	data container;
	list detail;
	alamatsimpul sibling;
	alamatsimpul child;	
}simpul;

typedef struct
{
	simpul* root;
}tree;

int maxLvl;

void createList(list *L);
int countElement(list L);
void addFirst(char temp[], list *L);
void addAfter(elemen *prev, char temp[], list *L);
void addLast(char temp[], list *L);
void printElementinTree(list L, int space);
void printElement(list L);


void makeTree(data temp, tree *T, list detail);
void addChild(data temp, simpul *root, list detail);
simpul* findSimpul(data temp, simpul *root);
void printTreePreOrder(simpul *root, tree T, int space);
void getLength(simpul *root, elemen *elmt, int lvl);
simpul *findBapak(char nama[], simpul *root);
int getSpace(simpul *root);
