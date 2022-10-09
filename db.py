import pandas as pd

from sklearn.model_selection import train_test_split
from sklearn.neighbors import KNeighborsClassifier
data = pd.read_csv("E:\MCA\Sem-3\ML\diabetes.csv")
print(data.info)
print(data.head())
print(data.describe())
print(data.dtypes)
X = data[['Pregnancies','Glucose','BloodPressure','SkinThickness','Insulin','DiabetesPedigreeFunction','Age']]
Y = data[['Outcome']]
x_train, x_test, y_train, y_test = train_test_split(X,Y,test_size = 0.2, random_state = 3)
classifier = KNeighborsClassifier(n_neighbors = 12,weights = 'distance',metric="euclidean")
classifier.fit(x_train,y_train)
y_pred = classifier.predict([[6,148,72,35,33.6,50,1]])
print(y_pred)
print(classifier.score(x_test,y_test))
print("Accuracy_score : ")
print(accuracy_score(y_test,classifier,normalize=True,sample_weight=None))



