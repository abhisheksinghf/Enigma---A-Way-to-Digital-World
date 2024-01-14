//
#include<stdio.h>

int main()
{
int i,j,r,c,rsum=0,csum=0,a[100][100];
printf("enter the order of the matrix:\n");
scanf("%d%d",&r,&c);
printf("enter the elemnts of matrix:\n");
for(i=0;i<r;i++){
	for(j=0;j<c;j++){
		scanf("%d",&a[i][j]);
	}
}
for(i=0;i<r;i++){
	for(j=0;j<c;j++){
		printf("%d\n",a[i][j]);
	}
}

for(i=0;i<r;i++)
{
	for(j=0;j<c;j++)
	{
		rsum=rsum+a[i][j];
	}
	rsum=0;
	printf("the sum of %d row is %d\n",i+1,rsum);
}
for(j=0;j<c;j++){
	for(i=0;i<r;i++)
	  csum=0;
	  {
		csum=csum+a[i][j];
			}
	printf("the sum of %d coloum is %d\n",j+1,csum);
}
return 0;
}

