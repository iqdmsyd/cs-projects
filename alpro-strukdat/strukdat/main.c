#include "header.h"

int main()
{
	tree T;
	list L;
	data input;
	simpul *node;
	int i, j, n, x, counter;
	char temp[128], toList[256], numTemp[16];

	scanf("%d", &n);

	for(i = 0; i<n; i++)
	{
		scanf("%s", &temp);
		j = 0;
		counter = 0;

		while(temp[j] != '#')
		{
			input.root[counter] = temp[j];
			counter++;
			j++;
		}
		input.root[counter] = '\0';
		j++;

		counter = 0;
		while(temp[j] != '#')
		{
			input.leaf[counter] = temp[j];
			counter++;
			j++;

		}
		input.leaf[counter] = '\0';
		j++;

		counter = 0;
		while( j < strlen(temp))
		{
			numTemp[counter] = temp[j];
			counter++;
			j++;
		}
		numTemp[counter] = '\0';

		x = atoi(numTemp);
		createList(&L);

		for(j=0; j<x; j++)
		{
			scanf("%s", &toList);
			addLast(toList, &L);
		}

		if(i == 0)
			makeTree(input, &T, L);
		else
		{
			node = findSimpul(input, T.root);
			if(node != NULL)
				addChild(input, node, L);
		}

		node = findSimpul(input, T.root);

	}

	int m;
	maxLvl = 0;
	scanf("%d", &m);
	data search[m];

	for(i=0; i<m; i++)
	{
		scanf("%s", &search[i].root);
	}

	getLength(T.root, NULL, 0);

	printf("Max level : %d\n", maxLvl);
	printTreePreOrder(T.root, T, 0);

	printf("kebaikan:\n");
	for(i=1; i<m; i++)
	{
		node = findSimpul(search[i], T.root);
		printf("- %s\n", node->container.root);
	}

	printf("\nperbuatan yang dilakukan:\n");
	for(i=1; i<m; i++)
	{
		node = findSimpul(search[i], T.root);
		if(node != NULL)
			printElement(node->detail);
	}

	printf("\nhal yang didapat:\n");
	node = findSimpul(search[m-1], T.root);
	if(node != NULL)
	{
		node = node->child;
		printf("- %s\n", node->container.root);

		printf("\ntandanya:\n");
		printElement(node->detail);	
	}


	return 0;
}
