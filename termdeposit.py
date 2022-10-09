import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.neighbors import KNeighborsClassifier
from sklearn.metrics import accuracy_score
data = pd.read_csv("E:\MCA\Sem-3\ML\Assignment-2_Data.csv")
print(data.info())
print(data.head())
print(data.describe())
print(data.dtypes)

X = data[['duration','campaign','pdays']]
Y = data[['y']]

x_train, x_test,y_train,y_test = train_test_split(X,Y,test_size = 0.2,random_state = 5)
classifier = KNeighborsClassifier(n_neighbors = 10)
classifier.fit(x_train,y_train)
classifier.score(x_test,y_test)
print(classifier.predict([[1467,1,-1]]))

print(classifier.score(x_test,y_test))
print("Accuracy_score : ")
print(accuracy_score(y_test,classifier,normalize=True,sample_weight=None))


